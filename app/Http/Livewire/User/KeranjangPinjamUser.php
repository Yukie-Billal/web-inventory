<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Traits\ListenerTrait;
use App\Models\PeminjamanKeranjang;

class KeranjangPinjamUser extends Component
{
    use ListenerTrait;

    protected $listeners = [
        'toastify','swal','fresh',
    ];

    public function deleteItem($id)
    {
        $keranjang = PeminjamanKeranjang::find($id);
        if ($keranjang) {
            $keranjang->delete();
            $this->emit('toastify', ['success', 'Item Di Hapus', 3000]);
        } else {
            $this->emit('toastify', ['danger', 'Item Tidak Ditemukan', 3000]);
        }
    }
    
    public function render()
    {
        return view('livewire.user.keranjang-pinjam-user', [
            'keranjangs' => PeminjamanKeranjang::orderByDesc('created_at')->where('user_id', auth()->user()->id)->get()
        ]);
    }
}
