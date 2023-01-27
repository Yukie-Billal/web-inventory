<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UserIndex extends Component
{
    use WithPagination;

    public $pageCount;
    public $pageName;

    protected $queryString = [
        'page' => ['except' => '', 'as' => 'userPage'],
    ];

    protected $listeners = [
        'next-page' => 'next',
        'previous-page' => 'previous',
    ];

    public function next($page)
    {
        $this->nextPage($page);
    }
    public function previous($page)
    {
        $this->previousPage($page);
    }

    public function render()
    {
        $users = User::orderByDesc('created_at')->orderByDesc('email');
        // Counting Page
        $all = $users->count();
        $sisa = $all % 10;
        if ($sisa <= 0) {
            $count = 1;
        } else if ($sisa >= 1) {
            $count = (($all - $sisa) / 10) + 1;
        }
        $this->pageCount = $count;
        if ($this->page > $count) {
            $this->page = 1;
        }

        return view('livewire.user.user-index', [
            'users' => $users->paginate(10)
        ]);
    }
}
