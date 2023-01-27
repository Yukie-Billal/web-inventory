<?php

namespace App\Http\Livewire\Peminjaman;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;

class DataBarang extends Component
{
    use WithPagination;

    public $pageName = 'page';
    public $pageCount;

    public function render()
    {
        $barangs = Barang::all();
        $barang_all = $barangs->count();
        $sisa = $barang_all % 10;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($barang_all - $sisa) / 10) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->page = 1;
        }
        return view('livewire.peminjaman.data-barang');
    }
}
