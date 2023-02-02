<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class PrinterController extends Controller
{
    public function print_barcode(Barang $barang)
    {
        // dd($barang);
        return view('pages.pdf.barcode', [
            'barang' => $barang,
            'banyak' => Barang::get()->count()
        ]);
    }
}
