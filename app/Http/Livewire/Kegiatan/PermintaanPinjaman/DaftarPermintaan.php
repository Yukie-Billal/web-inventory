<?php

namespace App\Http\Livewire\Kegiatan\PermintaanPinjaman;

use Livewire\Component;
use App\Models\PermintaanPinjaman;

class DaftarPermintaan extends Component
{
    public function render()
    {
        return view('livewire.kegiatan.permintaan-pinjaman.daftar-permintaan', [
            'permintaans'=>PermintaanPinjaman::with(['user', 'barang'])->orderByDesc('created_at')->get(),
        ]);
    }
}
