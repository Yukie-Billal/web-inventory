<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Pinjaman;
use App\Traits\ListenerTrait;

class HistoryPinjaman extends Component
{
    use ListenerTrait;

    protected $listeners = [
        'toastify', 'fresh',
    ];
    
    public function render()
    {
        return view('livewire.user.history-pinjaman', [
            'pinjamans' => Pinjaman::with(['barang'])->get()
        ]);
    }
}
