<?php

namespace App\Http\Livewire\MasukBarang;

use Livewire\Component;
use App\Models\BarangMasuk;

class MasukBarangHistory extends Component
{
    protected $listeners = [
        'barangMasukAdded',
    ];

    public function barangMasukAdded()
    {
        
    }

    public function render()
    {
        return view('livewire.masuk-barang.masuk-barang-history',[
            'masuk_barangs' => BarangMasuk::orderByDesc('created_at')->whereDate('created_at', date('Y-m-d'))->get()
        ]);
    }
}
