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

    protected $listeners = [
        'AddedKeranjangKeluar',
        'kodeSlipper',
    ];

    public function updated()
    {
        // if ($this->status == 'Pinjam') {
        //     $this->statusCovery();
        // }
    }

    public function kodeSlipper($keranjang)
    {
        $this->kodeSlipper = $keranjang;
    }

    public function statusCovery($id)
    {
        $bkk = BarangKeluarKeranjang::find($id);
        if ($bkk) {
            $bkk->update([
                'status' => $this->status
            ]);
        }
        $this->status = '';
        $this->render();
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
