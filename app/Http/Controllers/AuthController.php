<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('pages.Auth.register');
    }

    public function register_act(Request $request, User $user)
    {
        dd($user);
    }

    public function login()
    {
        return view('pages.Auth.login');
    }

    public function loginAct(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        // $level = User::where('email', $credentials['email'])->get('level');
        // $credentials['level'] = $level;
       
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            return redirect()->intended('/')->with('message', 'Selamat Berhasil Login');

        } elseif (Auth::check()) {
            return redirect('/');            
        }
        
        return redirect('/')->with('failed','Login Failed, Username or Pasword wrong');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
