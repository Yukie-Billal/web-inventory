<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $parent;
    public $where;
    public $header;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($parent, $where, $header = 'm')
    {
        $this->parent = $parent;
        $this->where = $where;
        $this->header = $header;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.breadcrumb');
    }
}
