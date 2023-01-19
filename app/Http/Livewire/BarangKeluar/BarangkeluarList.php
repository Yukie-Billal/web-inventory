<?php

namespace App\Http\Livewire\BarangKeluar;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Livewire\Component;
use App\Models\BarangKeluarKeranjang;
use Illuminate\Support\Facades\Blade;

class BarangkeluarList extends Component
{
    public $status = '';
    public $kodeBarang;
    public BarangKeluarKeranjang $barangKeluarKeranjang;

    protected $listeners = [
        'AddedKeranjangKeluar',
        'kodeSlipper',
        'setStatus'
    ];

    public function updated()
    {
        // if ($this->status == 'Pinjam') {
        //     $this->statusCovery();
        // }
    }

    public function searchKode()
    {
        $barang = Barang::where('kode', $this->kodeBarang)->get();
        if ($barang->count() == 1) {
            $barangList = $barang[0];
            if ($barangList) {
                $cek = BarangKeluarKeranjang::where('barang_id', $barangList->id)->where('kode_barang', $barangList->kode)->where('nama_barang', $barangList->nama_barang)->get();

                if ($cek == '[]') {
                    BarangKeluarKeranjang::create([
                        'barang_id' => $barangList->id,
                        'kode_barang' => $barangList->kode,
                        'nama_barang' => $barangList->nama_barang,
                        'jumlah_keluar' => 1,
                        'tanggal_keluar' => date('Y-m-d'),
                        'status' => 'Pinjam',
                    ]);
                } else {
                    if ($cek[0]->kode_barang == $barangList->kode) {
                        foreach ($cek as $item) {
                            $kondisi = null;
                            $item->status == 'Pinjam' ? $kondisi = 1 : '';
                            if ($item->status == 'Pinjam') {
                                $item->update([
                                    'jumlah_keluar' => $item->jumlah_keluar + 1,
                                ]);
                            } elseif ($kondisi == null) {
                                BarangKeluarKeranjang::create([
                                    'barang_id' => $barangList->id,
                                    'kode_barang' => $barangList->kode,
                                    'nama_barang' => $barangList->nama_barang,
                                    'jumlah_keluar' => 1,
                                    'tanggal_keluar' => date('Y-m-d'),
                                    'status' => 'Pinjam',
                                ]);
                            }
                        }                        
                    }
                }
            }
            $this->emit('AddedKeranjangMasuk');
        }
        if ($barang->count()  <= 0) {
            session()->flash('message', 'Barang Tidak Ditemukan');
        }
        $this->kodeBarang = '';
        $this->render();  
    }

    public function kodeSlipper($keranjang)
    {
        $this->kodeSlipper = $keranjang;
    }

    public function statusCovery($id)
    {
        $this->emit('change-status', $id);
    }

    public function setStatus($params)
    {
        $id = $params[0];
        $value = $params[1];
        $bkk = BarangKeluarKeranjang::find($id);

        $barangList = Barang::find($bkk->barang_id);

        $cek = BarangKeluarKeranjang::where('barang_id', $barangList->id)->where('kode_barang', $barangList->kode)->where('nama_barang', $barangList->nama_barang)->get();

        foreach ($cek as $data) {
            if ($data->status == $value) {                
                $data->update(['jumlah_keluar' => $data->jumlah_keluar + $bkk->jumlah_keluar]);
                $bkk->destroy($id);
            }
            if ($data->status != $value) {
                $bkk ? $bkk->update(['status' => $value]) : '' ;
            }
        }
    }

    public function qtyPlus($id)
    {
        $barangKeluarKeranjang = BarangKeluarKeranjang::find($id);
        if ($barangKeluarKeranjang) {
            $barangKeluarKeranjang->update([
                'jumlah_keluar' => $barangKeluarKeranjang->jumlah_keluar + 1
            ]);
        }
    }

    public function qtyMinus($id)
    {
        $barangKeluarKeranjang = BarangKeluarKeranjang::find($id);
        if ($barangKeluarKeranjang) {
            if ($barangKeluarKeranjang->jumlah_keluar == 1) {
                session()->flash('message', 'Qty Tidak Bisa Kurang Dari 1');
            } else {                
                $barangKeluarKeranjang->update([
                    'jumlah_keluar' => $barangKeluarKeranjang->jumlah_keluar - 1
                ]);
            }
            
        }
    }

    public function AddedKeranjangKeluar()
    {
        // ....
    }

    public function deleteBarangKeluarList($id)
    {
        $barangKeluarKeranjang = BarangKeluarKeranjang::find($id);
        if ($barangKeluarKeranjang) {
            BarangKeluarKeranjang::destroy($id);
        }
        $this->render();
    }

    public function confirm()
    {
        $bbk = BarangKeluarKeranjang::all();
        foreach ($bbk as $k) {
            BarangKeluar::create([
                'barang_id' => $k->barang_id,
                'kode_barang' => $k->kode_barang,
                'nama_barang' => $k->nama_barang,
                'tanggal_keluar' => $k->tanggal_keluar,
                'jumlah_keluar' => $k->jumlah_keluar,
                'status' => $k->status,
            ]);
            $barang = Barang::find($k->barang_id);
            $barang->update([
                'stok' => $barang->stok - $k->jumlah_keluar
            ]);
            $k->destroy($k->id);
        }
        
        $this->emit('BarangkeluarAdded');
        $this->render();
    }

    public function render()
    {
        return view('livewire.barang-keluar.barangkeluar-list', [
            'barangKeluarKeranjangs' => BarangkeluarKeranjang::all(),
        ]);
    }
}
