<?php

namespace App\Http\Livewire\Data\PinjamKembali;

use App\Models\Pinjaman;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\PaginateTrait;

class PinjamIndex extends Component
{
    use WithPagination, PaginateTrait;

    public $pageName = 'page';
    public $pageCount = 1;

    protected $listeners = [
        'next-page' => 'nextPage',
        'previous-page' => 'previousPage',
        'pageTo' => "gotoPage",
    ];

    public function render()
    {
        $pinjams = Pinjaman::orderByDesc('created_at');

        $this->pageCount = $this->countPage($pinjams->count());
        
        return view('livewire.data.pinjam-kembali.pinjam-index', [
            'pinjams' => $pinjams->paginate(10, ['*'], 'pinjam'),
        ]);
    }
}
