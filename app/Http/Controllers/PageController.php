<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
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

        
        return redirect('/login')->with('failed','Login Failed, Username or Pasword wrong');
    }

    public function barang()
    {
        return view('pages.data.barang');
    }

    public function barangKeluar()
    {
        return view('pages.data.barang-keluar');
    }

    public function barangMasuk()
    {
        return view('pages.data.barang-masuk');
    }

    public function peminjaman()
    {
        return view('pages.kegiatan.peminjaman');
    }

    public function pengembalian()
    {
        return view('pages.kegiatan.pengembalian');
    }

    public function masuk_barang()
    {
        return view('pages.kegiatan.masuk-barang');
    }
}
