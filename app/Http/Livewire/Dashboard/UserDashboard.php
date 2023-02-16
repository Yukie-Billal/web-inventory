<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Barang;

class UserDashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard.user-dashboard', [
            'barangs' => Barang::orderByDesc('nama_barang')->orderByDesc('created_at')->get(),
        ]);
    }
}
