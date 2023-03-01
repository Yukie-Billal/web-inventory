<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Traits\ListenerTrait;

class FotoProfileUpload extends Component
{
    use WithFileUploads, ListenerTrait;

    protected $listeners = [
        'toastify','swal','fresh',
    ];

    public $userId;
    public $foto;

    public function uploadFoto()
    {
        $this->validate([
            'foto' => 'image|max:2048', // 2MB Max
        ]);

        // dd($this->foto);
        $url = $this->foto->store('profile');

        $user= User::find($this->userId);
        $user->update([
            'foto' => $url
        ]);

        $this->emit('uploaded');
    }
    public function render()
    {
        return view('livewire.auth.foto-profile-upload');
    }
}
