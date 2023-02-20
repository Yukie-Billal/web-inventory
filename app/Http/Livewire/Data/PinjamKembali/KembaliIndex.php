<?php

namespace App\Http\Livewire\Data\PinjamKembali;

use Livewire\Component;
use App\Models\Pengembalian;
use Livewire\WithPagination;
use App\Traits\PaginateTrait;

class KembaliIndex extends Component
{
    use WithPagination, PaginateTrait;

    public $pageCount = 1;
    public $pageName = 'page';

    public function render()
    {
        $kembalis = Pengembalian::orderByDesc('created_at');

        $this->pageCount = $this->countPage($kembalis->count());

        return view('livewire.data.pinjam-kembali.kembali-index', [
            'kembalis' => $kembalis->get()
        ]);
    }
}
