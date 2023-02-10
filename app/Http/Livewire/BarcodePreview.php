<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BarcodeKeranjang;

class BarcodePreview extends Component
{
    protected $listeners = [
        'fresh' => 'render'
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
        return view('livewire.barcode-preview', [
            'barcodes' => BarcodeKeranjang::orderByDesc('created_at')->get(),
        ]);
    }
}
