<?php

namespace App\Http\Livewire\Cetak;

use Livewire\Component;
use App\Models\BarcodeKeranjang;

class KeranjangBarcode extends Component
{
    protected $listeners = [
        'fresh' => 'render',
        'deleteItem',
        'barcodeReseted',
    ];

    public function barcodeReseted()
    {
        // code...
    }

    public function deleteItem($id)
    {
        $item = BarcodeKeranjang::find($id);

        if ($item) {
            $item->delete();
            $this->emit('deletedItem', 'Berhasil Menghapus');            
        } else {
            $this->emit('400', 'Item Tidak Ditemukan');
        }
        $this->render();
    }

    public function render()
    {
        return view('livewire.cetak.keranjang-barcode', [
            'barcodes' => BarcodeKeranjang::orderBy('created_at', 'asc')->get(),
        ]);
    }
}
