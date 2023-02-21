<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Barang;
use App\Models\PeminjamanKeranjang;
use Illuminate\Support\Str;
use App\Traits\ListenerTrait;

class UserSearch extends Component
{
    use ListenerTrait;

    public $barang;

    protected $listeners = [
        'setBarang',
        'addBarangPinjamList',
        'fresh'
    ];

    public function setBarang($value)
    {
        $value = Str::afterLast($value, '-');
        $barang = Barang::find($value);
        $this->barang = $barang;
    }

    public function addBarangPinjamList()
    {
        $pinjam = PeminjamanKeranjang::create([
            'user_id' => auth()->user()->id,
            'barang_id' => $this->barang->id,
        ]);

        if ($pinjam) {
            $this->emit('toastify', ['success', 'Barang Ditambahkan Ke List Pinjaman', 3000]);
        } else {
            $this->emit('toastify', ['danger', 'Gagal Menmbahkan', 3000]);
        }
    }

    public function render()
    {
        return view('livewire.user.user-search', [
            'barangs' => Barang::orderByDesc('nama_barang')->orderByDesc('created_at')->get()
        ]);
    }
}
