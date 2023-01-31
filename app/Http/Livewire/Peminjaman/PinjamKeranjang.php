<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;
use App\Models\PeminjamanKeranjang;

class PinjamKeranjang extends Component
{
    protected $listeners = [
        'addPinjamKeranjang',
        'addPeminjaman' => 'render'
    ];

    public function addPinjamKeranjang()
    {
        // code...
    }

    public function deleteKeranjangPinjam($id)
    {
        $data = PeminjamanKeranjang::find($id);

        $data->delete();

        $this->render();
    }
    
    public function render()
    {
        $keranjangs = PeminjamanKeranjang::orderByDesc('created_at');
        return view('livewire.peminjaman.pinjam-keranjang', [
            'pinjam_keranjangs' => $keranjangs->get(),
        ]);
    }
}
