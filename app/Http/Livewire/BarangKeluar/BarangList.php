<?php

namespace App\Http\Livewire\BarangKeluar;

use Livewire\Component;
use App\Models\Barang;
use App\Models\BarangKeluarKeranjang;
use App\Models\BarangMasukKeranjang;

class BarangList extends Component
{
    public $kodeBarang;
    public $namaBarang;
    public $stok;
    public $jumlah_keluar;
    public $where;
    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'BarangkeluarAdded' => 'render',
        'BarangMasukAdded' => 'render',
        'barangAdded' => 'render',
    ];

    public function AddBarangList($id)
    {
        $barangList = Barang::find($id);

        // Jika Url Barang Masuk, Code dibawah di execute 
        if ($this->where == 'm') {
            // BarangMasukKeranjang::create([
            //     'barang_id' => $barangList->id,
            //     'kode_barang' => $barangList->kode,
            //     'nama_barang' => $barangList->nama_barang,
            //     'jumlah_masuk' => 1,
            //     'tanggal_masuk' => date('Y-m-d'),
            // ]);

            if ($barangList) {
                $cek = BarangMasukKeranjang::where('barang_id', $barangList->id)->where('kode_barang', $barangList->kode)->where('nama_barang', $barangList->nama_barang)->get();

                if ($cek == '[]') {
                    BarangMasukKeranjang::create([
                        'barang_id' => $barangList->id,
                        'kode_barang' => $barangList->kode,
                        'nama_barang' => $barangList->nama_barang,
                        'jumlah_masuk' => 1,
                        'tanggal_masuk' => date('Y-m-d'),
                        // 'status' => 'Pinjam',
                    ]);
                } else {
                    if ($cek[0]->kode_barang == $barangList->kode) {
                        foreach ($cek as $item) {
                            // $kondisi = null;
                            // $item->status == 'Pinjam' ? $kondisi = 1 : '';
                            // if ($item->status == 'Pinjam') {
                                $item->update([
                                    'jumlah_masuk' => $item->jumlah_masuk + 1,
                                ]);
                            // } elseif ($kondisi == null) {
                            //     BarangMasukKeranjang::create([
                            //         'barang_id' => $barangList->id,
                            //         'kode_barang' => $barangList->kode,
                            //         'nama_barang' => $barangList->nama_barang,
                            //         'jumlah_masuk' => 1,
                            //         'tanggal_masuk' => date('Y-m-d'),
                            //         'status' => 'Pinjam',
                            //     ]);
                            // }
                        }                        
                    }
                }
            }
            $this->emit('AddedKeranjangMasuk');
        }


        // Jika Sedang Berada Di Data barang Keluar
        if ($this->where == 'k') {
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
            $this->emit('AddedKeranjangKeluar');
        }
        $this->search = '';
        $this->render();
    }
    
    public function render()
    {
        $barang = Barang::orderByDesc('id');

        if ($this->search != null) {
            $barang->where('kode', 'like', '%'. $this->search .'%')
                    ->orWhere('nama_barang','like', '%'. $this->search .'%')
                    ->orWhere('stok','like', '%'. $this->search .'%');
        }
        return view('livewire.barang-keluar.barang-list', [
            'barangs' => $barang->get(),
        ]);
    }
}
