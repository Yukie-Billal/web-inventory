<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Barang;
use Illuminate\Support\Str;
use App\Models\PeminjamanKeranjang;

class UserDashboard extends Component
{
    public $barang;

    protected $listeners = [
        'setBarang',
        'addBarangPinjamList',
        'resetKeranjang',
        'fresh',
    ];

    public function fresh(){}

    public function setBarang($value)
    {
        $value = Str::afterLast($value, '-');
        $barang = Barang::find($value);
        $this->barang = $barang;
    }

    public function resetKeranjang()
    {
        $keranjangs = PeminjamanKeranjang::where('user_id', auth()->user()->id)->get();
        foreach ($keranjangs as $keranjang) {
            $keranjang->delete();
        }

        $this->emit('toastify', ['danger', 'Reseted Item', 3000]);
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

    public function deleteList($id)
    {
        $item = PeminjamanKeranjang::find($id);
        if ($item) {
            $item->delete();
            $this->emit('toastify', ['success','Di Hapus Dari List', 3000]);
        } else {
            $this->emit('toastify', ['danger', 'Item Tidak Ditemukan', 3000]);
        }
    }

    public function render()
    {
        return view('livewire.dashboard.user-dashboard', [
            'barangs' => Barang::orderByDesc('nama_barang')->orderByDesc('created_at')->get(),
            'keranjangs' => PeminjamanKeranjang::orderByDesc('created_at')->where('user_id', auth()->user()->id)->get()
        ]);
    }
}
