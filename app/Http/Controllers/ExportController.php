<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use PDF;

class ExportController extends Controller
{
    public function barcode_pdf(Barang $barang)
    {
        $banyak = Barang::get()->count();
        $pdf = PDF::loadView('pages.pdf.barcode', ['barang' => $barang, 'banyak' => $banyak]);
        return $pdf->stream('barcode-produk.pdf');
    }
}