<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchModal extends Component
{
    public $search;

    protected $queryString = [
        'search' => ['except' => '', 'as' => 's'],
    ];

    public function updatedSearch()
    {
        
    }
    public function render()
    {
        return view('livewire.search-modal');
    }
}
