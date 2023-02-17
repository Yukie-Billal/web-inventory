<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
// use App\Helper\AppHelper;

class UserIndex extends Component
{
    use WithPagination;

    public $pageCount;
    public $pageName;

    protected $queryString = [
        'page' => ['except' => '', 'as' => 'userPage'],
    ];

    protected $listeners = [
        'next-page' => 'nextPage',
        'previous-page' => 'previousPage',
        'pageTo' => "gotoPage",
        'deleteUser',
    ];

    public function confirmDelete($id)
    {
        $params = ['question', 'Hapus User ?', true, 'deleteUser', $id];
        $this->emit('alertConfirm', $params);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
        } else {
            $params = ['error', 'User Tidak Ditemukan', 2000];
            $this->emit('alertShow', $params);
        }
    }

    public function getUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $this->emit('editUser',$user);
        } else {
            $this->emit('alertShow', ['error', 'Data Tidak Ditemukan']);
        }
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
