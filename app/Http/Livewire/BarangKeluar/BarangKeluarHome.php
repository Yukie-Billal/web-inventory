<?php

namespace App\Http\Livewire\BarangKeluar;

use App\Models\Barang_keluar;
use App\Models\BarangKeluar;
use Livewire\Component;

class BarangKeluarHome extends Component
{
    public function render()
    {
        return view('livewire.barang-keluar.barang-keluar-home',[
            'barangKeluars' => BarangKeluar::orderByDesc('id')->limit(6)->get(),
        ]);
    }
}
