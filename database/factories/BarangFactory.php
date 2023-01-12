<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode' => Str::random(20),
            'nama_barang' => 'Barang ' . fake()->unique()->randomNumber(2, false),
            // 'gambar' => 'Url Tidak Tersedia',
            'stok' => 20,
        ];
    }
}
