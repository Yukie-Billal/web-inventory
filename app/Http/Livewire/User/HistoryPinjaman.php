<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Pinjaman;

class HistoryPinjaman extends Component
{
    public function render()
    {
        return view('livewire.user.history-pinjaman', [
            'pinjamans' => Pinjaman::with(['barang', 'user'])->get()
        ]);
    }
}
