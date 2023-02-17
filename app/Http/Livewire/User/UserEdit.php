<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserEdit extends Component
{
    public $namaUser;
    public $email;
    public $alamat;
    public $noTlp;
    public $role;

    protected $listeners = [
        'editUser'
    ];

    public function editUser($user)
    {
        dd($user);
        $this->namaUser = $user->nama;
        $this->email =  $user->email;
        $this->alamat = $user->alamat
        $this->noTlp = $user->no_tlp
        // $this->role = $user->role->nama_role;
    }

    public function render()
    {
        return view('livewire.user.user-edit', [
            'roles' => Role::orderByDesc('nama_role')->get()
        ]);
    }
}
