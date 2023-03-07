<?php

namespace App\Http\Livewire\Cetak;

use Livewire\Component;
use App\Models\BarcodeKeranjang;
use App\Models\BarangMasuk;
use Illuminate\Support\Str;

class BarcodePreview extends Component
{
    public $jumlah = 1;
    public $panjang = .85;
    public $lebar = 66;
    public $perRow = 4;

    protected $listeners = [
        'updatePreview',
        'resetBarcode',
        'setUkuranBarcode',
    ];

    public function setUkuranBarcode($value)
    {
        $panjang = Str::before($value, ',');
        $lebar = Str::after($value, ',');
        $this->panjang = $panjang;
        $this->lebar = $lebar;

        if ($panjang == .85) {
            $this->perRow = 4;
        } elseif ($panjang == 1) {
            $this->perRow = 3;
        } elseif ($panjang == 1.4) {
            $this->perRow = 2;
        }
        $this->render();
    }

    public function updatePreview()
    {
        $this->render();
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