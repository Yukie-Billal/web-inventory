<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Traits\ListenerTrait;
use App\Models\PeminjamanKeranjang;
use App\Models\PermintaanPinjaman;

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
    public function kirimPermintaan()
    {
        $keranjangs = PeminjamanKeranjang::where('user_id', auth()->user()->id)->get();
        foreach ($keranjangs as $keranjang) {
            $permintaan = PermintaanPinjaman::create([
                'user_id' => auth()->user()->id,
                'barang_id' => $keranjang->barang_id,
            ]);
            if ($permintaan) {
                $keranjang->delete();
                $this->emit('toastify', ['success', 'Ditambahkan', 3000]);
            } else {
                $this->emit('toastify', ['danger', 'Gagal Menmbah', 3000]);
            }
        }
    }
    public function render()
    {
        return view('livewire.user.keranjang-pinjam-user', [
            'keranjangs' => PeminjamanKeranjang::orderByDesc('created_at')->where('user_id', auth()->user()->id)->get()
        ]);
    }
}
