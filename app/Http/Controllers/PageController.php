<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
Use PDF;

class PageController extends Controller
{
    public function index()
    {
        // return Http::get('https://laravel.com');
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

    public function cetak_barcode()
    {
        return view('pages.kegiatan.cetak-barcode');
    }
}