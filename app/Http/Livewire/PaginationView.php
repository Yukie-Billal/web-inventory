<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PaginationView extends Component
{
    // use WithPagination;
    public $page;
    public $pageCount;
    public $pageName;
    public $col;
    public $button;
    public $input;

    public function render()
    {
        if ($this->col == '') {
            $this->col = 6;
        }

        if ($this->col < 8) {
            $this->button = 4;
            $this->input = 2;
        } else {
            $this->button = 3;
            $this->input =1;
        }
        return view('livewire.pagination-view');
    }
}
