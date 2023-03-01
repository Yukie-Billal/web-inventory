<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GlobalSearch;

class GlobalSearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GlobalSearch::create([
            'judul' => 'Daftar Barang',
            'deskripsi' => 'Daftar Barang Pada Gudang',
            'halaman' => 'Barang',
            'url' => '/barangs',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Daftar Supplier',
            'deskripsi' => 'Daftar Data Supplier',
            'halaman' => 'Supplier',
            'url' => '/suppliers-users#suppliers',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Daftar User',
            'deskripsi' => 'Daftar User Pada Aplikasi',
            'halaman' => 'User',
            'url' => '/suppliers-users#users',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Daftar History Barang Masuk',
            'deskripsi' => 'Daftar Barang Masuk DI Gudang',
            'halaman' => 'Barang Masuk',
            'url' => '/barang-masuks',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Daftar Peminjaman',
            'deskripsi' => 'Daftar Barang Yang Dipinjam',
            'halaman' => 'Pinjaman',
            'url' => '/pinjams-kembalis#pinjaman',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Daftar Pengembalian Barang',
            'deskripsi' => 'Daftar Barang Yang Di Kembalikan',
            'halaman' => 'Pengembalian',
            'url' => '/pinjams-kembalis#kembalis',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Peminjaman',
            'deskripsi' => 'Halaman Untuk Mencatat Peminjaman Barang',
            'halaman' => 'Peminjaman',
            'url' => '/peminjamans',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Pengembalian',
            'deskripsi' => 'Halaman Untuk Mencatat Pengembalian Barang',
            'halaman' => 'Peminjaman',
            'url' => '/pengembalians',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Masuk Barang',
            'deskripsi' => 'Halaman Untuk Merekap Barang Yang Masuk Dari Supplier',
            'halaman' => 'Peminjaman',
            'url' => '/masuk-barangs',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Cetak Barcode',
            'deskripsi' => 'Halaman untuk Mencetak Barcode Barang',
            'halaman' => 'Cetak Barcode',
            'url' => '/cetak-barcodes',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Permintaan Pinjaman',
            'deskripsi' => 'Halaman Untuk Melihat Permintaan / Pengajuan Pinjaman Barang Dari User',
            'halaman' => 'Pengajuan',
            'url' => '/permintaan-pinjamans',
            'role_id' => 1
        ]);
        GlobalSearch::create([
            'judul' => 'Profile',
            'deskripsi' => 'Halaman Profil Data Diri',
            'halaman' => 'Profile',
            'url' => '/profile/',
            'role_id' => null
        ]);
        GlobalSearch::create([
            'judul' => 'Home',
            'deskripsi' => 'Halaman Dashboard',
            'halaman' => 'Home',
            'url' => '/home',
            'role_id' => null
        ]);
    }
}
