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
        $this->call([
            RoleSeeder::class,
        ]);
        \App\Models\User::create([
            'nama' => 'Email',
            'email' => 'email@gmail.com',
            'password' => Hash::make(1234),
            'alamat' => 'Indonesia Cimahi Barat',
            'no_tlp' => '+6281238812938',
            'role_id' => 1,
        ]);
        \App\Models\User::create([
            'nama' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make(1234),
            'alamat' => 'Indonesia Cimahi Barat',
            'no_tlp' => '+6281238812938',
            'role_id' => 2,
        ]);

        Kategori::create([
            'nama_kategori' => 'Laptop',
        ]);

        Barang::create([
            'serial_number' => 120938,
            'kode_barang' => 'L0277-M7210',
            'nama_barang' => 'Laptop Modern Age',
            'merek' => 'Modern Age',
            'warna' => 'Hitam',
            'kategori_id' => 1,
            'satuan' => 'Pcs / Buah',
            'stok' => 25,
        ]);

        Barang::factory(14)->create();
    }
}
