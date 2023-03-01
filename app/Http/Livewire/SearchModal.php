<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GlobalSearch;

class SearchModal extends Component
{
    public $search;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
    ];

    public function render()
    {
        $dataSearch = GlobalSearch::orderByDesc('deskripsi')->where('role_id', auth()->user()->role_id)->orWhere('role_id', null);
        if ($this->search != null) {
            $dataSearch->where('judul', "like", '%'. $this->search .'%')->orWhere('deskripsi', 'like', '%'. $this->search .'%');
        }
        return view('livewire.search-modal', [
            'searchs' => $dataSearch->get(),
        ]);
    }
}
