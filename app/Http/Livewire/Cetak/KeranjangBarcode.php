<?php

namespace App\Http\Livewire\Cetak;

use Livewire\Component;
use App\Models\BarcodeKeranjang;

class KeranjangBarcode extends Component
{
    protected $listeners = [
        'fresh' => 'render',
        'deleteItem',
    ];

    public function deleteItem($id)
    {
        $item = BarcodeKeranjang::find($id);

        if ($item) {
            $item->delete();
            $this->emit('200', 'Berhasil Menghapus');
        } else {
            $this->emit('400', 'Item Tidak Ditemukan');
        }
        $this->render();
    }

    public function render()
    {
        return view('livewire.cetak.keranjang-barcode', [
            'barcodes' => BarcodeKeranjang::orderByDesc('created_at')->get(),
        ]);
    }
}
