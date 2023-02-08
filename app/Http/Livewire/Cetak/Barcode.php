<?php

namespace App\Http\Livewire\Cetak;

use Livewire\Component;

class Barcode extends Component
{
    public $barangid;
    public $kodeBarang;

    public function ()
    {
        // code...
    }

    public function render()
    {
        return view('livewire.cetak.barcode');
    }
}
