<?php

namespace App\Http\Livewire\Peminjaman;

use App\Models\Pinjaman;
use Livewire\Component;

class PeminjamanHistory extends Component
{
    protected $listeners = [
        'addPeminjaman' => 'render'
    ];

    public function render()
    {
        return view('livewire.peminjaman.peminjaman-history', [
            'pinjamans' => Pinjaman::orderByDesc('created_at')->whereDate('created_at', date('Y-m-d'))->get(),
        ]);
    }
}
