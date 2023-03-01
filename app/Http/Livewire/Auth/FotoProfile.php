<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Traits\ListenerTrait;

class FotoProfile extends Component
{
    use ListenerTrait;

    protected $listeners = [
        'toastify','fresh','swal',
        'uploaded',
    ];
    public function uploaded()
    {
        // code...
    }
    public function render()
    {
        return view('livewire.auth.foto-profile');
    }
}
