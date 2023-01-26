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

    public function render()
    {
        $users = User::orderByDesc('created_at')->orderByDesc('email');
        return view('livewire.user.user-index', [
            'users' => $users->get()
        ]);
    }
}
