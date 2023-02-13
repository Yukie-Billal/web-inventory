<?php

namespace App\Http\Livewire\Cetak;

use Livewire\Component;
use App\Models\BarcodeKeranjang;

class BarcodeKeranjangItem extends Component
{
    public $barcode;
    public $jumlah;

    public function mount($barcode)
    {
        $this->jumlah = $barcode->jumlah;
    }

    public function updated($propertyName)
    {
        if ($propertyName == 'jumlah') {
            $item = BarcodeKeranjang::find($this->barcode->id);
            $item->update(['jumlah' => $this->jumlah]);
        }
    }

    public function render()
    {
        return view('livewire.cetak.barcode-keranjang-item');
    }
}
