<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class PermintaanPinjam extends Component
{
    public function render()
    {
        return view('livewire.user.permintaan-pinjam', [
            'permintaans' => PermintaanPeminjaman::orderByDesc('created_at')->get(),
        ]);
    }
}
