<?php

namespace App\Http\Livewire\User;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class UserEdit extends Component
{
    public $userId;
    public $namaUser;
    public $email;
    public $alamat;
    public $noTlp;
    public $role;
    public $roleId;

    protected $listeners = [
        'editUser'
    ];

    protected $rules = [
        'namaUser' => 'required|min:2',
        'email' => 'required|email|min:2',
        'alamat' => 'required|min:6',
        'noTlp' => 'required|min:8',
        'roleId' => 'required|numeric'
    ];

    public function editUser($user)
    {
        $this->userId = $user['id'];
        $this->namaUser = $user['nama'];
        $this->email =  $user['email'];
        $this->alamat = $user['alamat'];
        $this->noTlp = $user['no_tlp'];
        $this->role = Role::find($user['role_id'])->nama_role;
    }

    public function updateUser()
    {
        $this->validate();
        $user = User::find($this->userId);
        if ($user) {
            $user->update([
                'nama' => $this->namaUser,
                'email' => $this->email,
                'alamat' => $this->alamat,
                'no_tlp' => $this->noTlp,
            ]);
            $this->emit('swal', ['success', 'user Di Ubah', 2000]);
        } else {
            $this->emit('swal', ['error', 'user Tidak Ditemukan', 2000]);
        }
    }

    public function render()
    {
        return view('livewire.user.user-edit', [
            'roles' => Role::orderByDesc('nama_role')->get()
        ]);
    }
}
