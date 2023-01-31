<?php

namespace App\Http\Livewire\Data\PinjamKembali;

use Livewire\Component;
use App\Models\Pengembalian;
use Livewire\WithPagination;

class KembaliIndex extends Component
{
    use WithPagination;

    public $pageCount = 1;
    public function render()
    {
        return view('livewire.data.pinjam-kembali.kembali-index', [
            'kembalis' => Pengembalian::orderByDesc('created_at')->get()
        ]);
    }
}
