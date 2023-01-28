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

    public function barang()
    {
        return view('pages.data.barang');
    }

    public function pinjam_kembali()
    {
        return view('pages.data.pinjam-kembali');
    }

    public function barangMasuk()
    {
        return view('pages.data.barang-masuk');
    }

    public function supplier_user()
    {
        return view('pages.data.supplier_user');
    }

    // Kegiatan 
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
