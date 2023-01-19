<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
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
    Route::get('/', [PageController::class, 'login'])->name('login');
    Route::post('/login/act', [PageController::class, 'loginAct']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [PageController::class, 'index'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/barang', [PageController::class, 'barang']);
Route::get('/barang/masuk', [PageController::class, 'barangMasuk']);
Route::get('/barang/keluar', [PageController::class, 'barangKeluar']);