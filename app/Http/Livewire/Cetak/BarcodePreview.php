<?php

namespace App\Http\Livewire\Cetak;

use Livewire\Component;
use App\Models\BarcodeKeranjang;
use App\Models\BarangMasuk;

class BarcodePreview extends Component
{
    public $jumlah = 1;

    protected $listeners = [
        'updatePreview',
        'resetBarcode',
    ];

    public function updatePreview()
    {
        // code...
    }

    public function resetBarcode()
    {
        $data = BarcodeKeranjang::all();

        foreach ($data as $item) {
            $item->delete();
        }
        $this->emit('barcodeReseted');
    }

    public function render()
    {
        return view('livewire.cetak.barcode-preview', [
            'barcodes' => BarcodeKeranjang::all(),
        ]);
    }
}