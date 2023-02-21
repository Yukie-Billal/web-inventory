<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;
use App\Models\PeminjamanKeranjang;
use App\Traits\PaginateTrait;
use App\Traits\ListenerTrait;

class DataBarang extends Component
{
    use WithPagination, PaginateTrait, ListenerTrait;

    public $pageName = 'page';
    public $pageCount;

    protected $listeners = [
        'addPeminjaman' => 'render',
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

        $this->countPage($barangs->count());

        return view('livewire.peminjaman.data-barang', [
            'barangs' => $barangs->paginate(6),
        ]);
    }
}
