<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;

class PinjamKeranjang extends Component
{
    protected $listeners = [
        'addPinjamKeranjang', 
    ];

    public function addPinjamKeranjang()
    {
        // code...
    }
    
    public function render()
    {
        return view('livewire.peminjaman.pinjam-keranjang', [
            'pinjam_keranjangs' => PinjamKeranjang::orderByDesc('created_at')->orderByDesc('nama_barang'),
        ]);
    }
}
