<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Barangkeluar;
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
        ]);

        Barang::factory(10)->create();
        Barangkeluar::factory(5)->create();
    }
}
