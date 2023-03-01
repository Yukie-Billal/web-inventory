<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\GlobalSearch;
use Illuminate\Database\Eloquent\Builder;

class SearchModal extends Component
{
    public $search;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatedSearch()
    {
        $this->render();
    }

    public function render()
    {
        $dataSearch = GlobalSearch::orderBy('judul', 'asc')->orderBy('deskripsi', 'asc');
        if ($this->search != null) {
            $dataSearch->where(function (Builder $query) {
                $query->where('judul', "like", '%'. $this->search .'%')
                        ->orWhere('deskripsi', 'like', '%'. $this->search .'%');
            });
        }
        $dataSearch->where(function (Builder $query) {
            $query->where('role_id', auth()->user()->role_id)
                    ->orWhere('role_id', null);
        });
        return view('livewire.search-modal', [
            'searchs' => $dataSearch->get(),
        ]);
    }
}
