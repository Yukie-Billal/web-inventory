<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;

class BarangIndex extends Component
{
    protected $listeners = [
        'barangAdded',
        'barangEdited',
    ];

    public function barangAdded()
    {
        session()->flash('message', 'Data Berhasil Ditambahkan');
    }
    public function barangEdited()
    {
        session()->flash('message', 'Data Berhasil Di Ubah');
    }

    public $search;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function editBarang($id)
    {
        $barangEdit = Barang::find($id);
        $this->emit('getBarang', $barangEdit);
    }

    public function deleteBarang($id)
    {
        $barang = Barang::find($id);
        $barangkeluar = BarangKeluar::find($barang);

        dd($barangkeluar);
        if ($barang) {
            Barang::destroy($id);
        }
        $this->render();
        session()->flash('message', 'Berhasil Menghapus Data');
    }

    public function render()
    {
        $barangs = Barang::orderByDesc('nama_barang')->orderByDesc('id');
        return view('livewire.barang-index', [
            'barangs' => $this->search == null 
                                    ? $barangs->get()
                                    : $barangs->where('nama_barang', 'like', '%' .$this->search. '%')->orWhere('kode', 'like', '%' .$this->search. '%')->orWhere('stok', 'like', '%' .$this->search. '%')->get(),
        ]);
    }
}
