<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public $nama;
    public $email;
    public $password;
    public $confirmPassword;

    protected $rules = [
        'nama' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:4',
        'confirmPassword' => 'required|same:password'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $validateData = $this->validate();

        $user = User::create([
            'nama' => $validateData['nama'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
        ]);

        if ($user) {
            return redirect('/')->with('registered', $user);
        }
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
