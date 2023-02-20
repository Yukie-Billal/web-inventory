<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Traits\PaginateTrait;

class UserIndex extends Component
{
    use WithPagination, PaginateTrait;

    public $pageCount;
    public $pageName = 'page';

    protected $queryString = [
        // 'userPage' => ['except' => ''],
    ];

    protected $listeners = [
        'next-page' => 'nextPage',
        'previous-page' => 'previousPage',
        'pageTo' => "gotoPage",
        'deleteUser',
        'swal',
    ];

    public function swal()
    {
        # code...
    }

    public function confirmDelete($id)
    {
        $this->emit('swalConfirm', ['question', 'Hapus User ?', true, 'deleteUser', $id]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            $this->emit('swal', ['success', 'data user Di hapus', 2000]);
        } else {
            $this->emit('swal', ['error', 'User Tidak Ditemukan', 2000]);
        }
    }

    public function getUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $this->emit('editUser',$user);
        } else {
            $this->emit('swal', ['error', 'Data Tidak Ditemukan']);
        }
    }
    
    public function render()
    {        
        $users = User::orderByDesc('created_at')->orderByDesc('email');

        $this->pageCount = $this->countPage($users->count());

        return view('livewire.user.user-index', [
            'users' => $users->paginate(10)
        ]);
    }
}
