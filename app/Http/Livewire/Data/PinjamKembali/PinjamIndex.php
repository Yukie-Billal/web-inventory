<?php

namespace App\Http\Livewire\Data\PinjamKembali;

use App\Models\Pinjaman;
use Livewire\Component;
use Livewire\WithPagination;

class PinjamIndex extends Component
{
    use WithPagination;

    public $pageName = 'page';
    public $pageCount = 2;

    public function render()
    {
        $pinjams = Pinjaman::orderByDesc('created_at');

        $barang_all = $pinjams->count();

        $sisa = $barang_all % 10;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($barang_all - $sisa) / 10) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->pageCount = 1;
        }
        
        return view('livewire.data.pinjam-kembali.pinjam-index', [
            'pinjams' => $pinjams->paginate(10, ['*'], 'pinjam'),
        ]);
    }
}
