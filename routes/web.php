<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PrinterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAct']);
    Route::get('/register', [AuthController::class, 'register']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PageController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::middleware(['IsAdmin'])->group(function () {
        Route::get('/barangs', [PageController::class, 'barang']);
        Route::get('/barang-masuks', [PageController::class, 'barangMasuk']);
        Route::get('/pinjams-kembalis', [PageController::class, 'pinjam_kembali']);
        Route::get('/suppliers-users', [PageController::class, 'supplier_user']);

        Route::get('/peminjamans', [PageController::class, 'peminjaman']);
        Route::get('/pengembalians', [PageController::class, 'pengembalian']);
        Route::get('/masuk-barangs', [PageController::class, 'masuk_barang']);
        Route::get('/cetak-barcodes', [PageController::class, 'cetak_barcode']);

        Route::get('/pdf/barcode/{barang}/', [ExportController::class, 'barcode_pdf']);
        Route::get('/print/barcode/{barang}', [PrinterController::class, 'print_barcode']);
    });

    Route::middleware(['IsUser'])->group(function () {
        Route::get('/daftar-barangs', [PageController::class, 'barang']);
    })
});
