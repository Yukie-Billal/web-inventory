<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Traits\ListenerTrait;
use App\Models\PermintaanPinjaman;

class PermintaanPinjam extends Component
{
    use ListenerTrait;
    protected $listeners = [
        'toastify', 'fresh',
    ];    
    public function render()
    {
        return view('livewire.user.permintaan-pinjam', [
            'permintaans' => PermintaanPinjaman::orderByDesc('created_at')->get(),
        ]);
    }
}
