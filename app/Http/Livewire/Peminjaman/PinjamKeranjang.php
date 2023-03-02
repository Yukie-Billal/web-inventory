<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;
use App\Models\PeminjamanKeranjang;
use App\Traits\ListenerTrait;

class PinjamKeranjang extends Component
{
    use ListenerTrait;
    
    protected $listeners = [
        'toastify','swal','fresh',
        'addPeminjaman' => 'render'
    ];

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
