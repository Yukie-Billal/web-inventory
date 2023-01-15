<?php

namespace App\Http\Livewire\BarangMasuk;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\BarangMasukKeranjang;
use Livewire\Component;

class BarangMasukList extends Component
{
    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'AddedKeranjangMasuk',
    ];

    public function AddedKeranjangMasuk()
    {
        # code...
    }

    public function qtyPlus($id)
    {
        $Keranjang = BarangMasukKeranjang::find($id);
        if ($Keranjang) {
            $Keranjang->update([
                'jumlah_masuk' => $Keranjang->jumlah_masuk + 1
            ]);
        }
    }

    public function qtyMinus($id)
    {
        $Keranjang = BarangMasukKeranjang::find($id);
        if ($Keranjang) {
            if ($Keranjang->jumlah_masuk == 1) {
                session()->flash('message', 'Qty Tidak Bisa Kurang Dari 1');
            } else {                
                $Keranjang->update([
                    'jumlah_masuk' => $Keranjang->jumlah_masuk - 1
                ]);
            }
            
        }
    }

    public function deleteBarangMasukList($id)
    {
        $keranjang =  BarangMasukKeranjang::find($id);
        if ($keranjang) {
            BarangMasukKeranjang::destroy($keranjang->id);
        }
        $this->render();
    }

    public function confirm()
    {
        $bbk = BarangMasukKeranjang::all();
        foreach ($bbk as $k) {
            BarangMasuk::create([
                'barang_id' => $k->barang_id,
                'kode_barang' => $k->kode_barang,
                'nama_barang' => $k->nama_barang,
                'tanggal_masuk' => $k->tanggal_masuk,
                'jumlah_masuk' => $k->jumlah_masuk,
            ]);
            $barang = Barang::find($k->barang_id);
            $barang->update([
                'stok' => $barang->stok + $k->jumlah_masuk
            ]);
            $k->destroy($k->id);
        }
        
        $this->emit('BarangMasukAdded');
        $this->render();
    }

    public function render()
    {
        $data = BarangMasukKeranjang::orderByDesc('tanggal_masuk')->orderByDesc('nama_barang');
        if ($this->search != null) {            
            $data = $data->where('kode_barang', 'like', '%'.$this->search.'%');
        }

        return view('livewire.barang-masuk.barang-masuk-list', [
            'barangMasukKeranjangs' => $data->get()
        ]);
    }
}
