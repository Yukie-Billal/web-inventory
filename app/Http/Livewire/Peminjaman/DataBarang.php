<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;
use App\Models\PeminjamanKeranjang;

class DataBarang extends Component
{
    use WithPagination;

    public $pageName = 'page';
    public $pageCount;

    protected $listeners = [
        'addPeminjaman' => 'render'
        'swal' => '$refresh'
    ];

    public function addPinjamKeranjang($id)
    {
        $barang = Barang::find($id);
        if ($barang) {
                PeminjamanKeranjang::create([
                    'user_id' => auth()->user()->id,
                    'barang_id' => $id
                ]);
        } else {
            $this->emit('toastify', ['danger', 'Gagal Menambahkan Barang', 2000]);
        }
        $this->emit('addPinjamKeranjang');        
    }

    public function render()
    {
        $barangs = Barang::orderByDesc('created_at')->orderByDesc('nama_barang');
        $barang_all = $barangs->count();
        $sisa = $barang_all % 6;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($barang_all - $sisa) / 6) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->page = 1;
        }

        return view('livewire.peminjaman.data-barang', [
            'barangs' => $barangs->paginate(6),
        ]);
    }
}
