<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BarcodeKeranjang;

class BarcodePreview extends Component
{
    protected $listeners = [
        'fresh' => 'render'
    ];

    public function render()
    {
        return view('livewire.barcode-preview', [
            'barcodes' => BarcodeKeranjang::orderByDesc('created_at')->get(),
        ]);
    }
}
