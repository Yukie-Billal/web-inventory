<?php

namespace App\Http\Controllers;

use App\Models\User;
Use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\permintaanPinjaman;
Use PDF;

class PageController extends Controller
{
    public function index()
    {
        // $response =  Http::get('https://api.rajaongkir.com/starter/city?key=44002ba3da0066f14333896a3ec6c9f2');

        // $data = $response->json()['rajaongkir'];
        // $data = json_decode($response)->rajaongkir;
        
        // dd($data->rajaongkir->results);
        // foreach ($data['results'] as $value) {
        //     dd($value['province']);
        // }
        return view('pages.dashboard', [
            // 'cities' => $data->results,
        ]);
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
    public function minta_permen()
    {
        return view('pages.kegiatan.permintaan-pinjaman');
    }
    public function show_permintaan(permintaanPinjaman $permintaanPinjaman)
    {
        $permintaanPinjaman->update(['read' => 1]);
        return view('pages.kegiatan.permintaan-pinjaman-detail', [
            'permintaan' => $permintaanPinjaman,
        ]);
    }
}