<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\User;

class Profile extends Component
{
    public $edit = false;

    public $userId;
    public $nama;
    public $email;  
    public $password;
    public $no_tlp;
    public $alamat;
    public $save_email;
    public $user;

    protected $rules = [
        'userId' => 'required|numeric',
        'nama' => 'required|min:2',
        'no_tlp' => 'required|min:4',
        'alamat' => 'required|min:4'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount($user)
    {
        $this->setUser($user->id);
    }

    public function batalEdit()
    {
        $this->setUser();
    }

    public function setUser($id)
    {
        $user = User::find($id);
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->save_email = Str::mask($user->email, '*', 3);
        $this->password = Str::mask(Str::limit($user->password, 12, ''), '*', 0);
        $this->no_tlp = $user->no_tlp;
        $this->alamat = $user->alamat;
    }

    public function updateProfile()
    {
        $this->validate();
        $user = User::find($this->userId);
        if ($user) {
            $user->update([
                'nama' => $this->nama,
                'no_tlp' => $this->no_tlp,
                'alamat' => $this->alamat,
            ]);

            $this->emit('toastify', ['success', 'Profile Berhasil Di Ubah', 3000]);
            $this->edit = false;
        } else {
            $this->emit('toastify',['danger', 'Gagal Menemukan Data', 3000]);
        }
    }

    public function render()
    {
        if ($this->edit == false) {
            $this->setUser($this->userId);
        }
        if ((auth()->user()->role->nama_role == "User" && auth()->user()->id != $this->userId)) {
            return abort(403);
        }
        return view('livewire.auth.profile');
    }
}
