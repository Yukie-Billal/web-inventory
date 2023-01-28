<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\BarangMasuk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'nama' => 'Email',
            'email' => 'email@gmail.com',
            'password' => Hash::make(1234),
            'alamat' => 'Indonesia Cimahi Barat',
            'no_tlp' => '+6281238812938'
        ]);

        Kategori::create([
            'nama_kategori' => 'Laptop',
        ]);
        Kategori::create([
            'nama_kategori' => 'Mouse',
        ]);
        Kategori::create([
            'nama_kategori' => 'Keyboard',
        ]);

        // Supplier::create([
        //     'nama_supplier' => 'Fauzi Rizky',
        //     'nama_perusahaan' => 'PT Tali Cahaya Buana',
        //     'no_tlp' => '0019283291',
        //     'alamat' => 'Baros Cimahi Tengah'
        // ]);
        
        // Barang::factory(10)->create();
        // Barangkeluar::factory(5)->create();
        // BarangMasuk::factory(5)->create();
    }
}
