<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Traits\ListenerTrait;
use Illuminate\Support\Facades\Storage;

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
        $url = $this->foto->store('profile');

        $user= User::find($this->userId);
        if ($user->foto != null) {
            Storage::delete($user->url);
        }
        $user->update([
            'foto' => $url
        ]);
        $this->emit('toastify', ['success', 'Foto Profil Di Ganti', 3500]);
    }
    public function render()
    {
        return view('livewire.auth.foto-profile-upload');
    }
}
