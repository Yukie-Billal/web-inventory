<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaginationView extends Component
{
    // use WithPagination;
    public $page;
    public $pageCount;
    public $pageName;
    
    public function render()
    {
        return view('livewire.pagination-view');
    }
}
