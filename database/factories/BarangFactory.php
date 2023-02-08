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
            'serial_number' => fake()->unique()->randomNumber(6, false),
            'barcode' => fake()->unique()->numerify('L####-A####'),
            'nama_barang' => 'Laptop ' . fake()->unique()->randomNumber(2, false),
            'merek' => 'Asus',
            'warna' => 'Hitam',
            'satuan' => 'Pcs / Buah',
            'kategori_id' => 1,
            'stok' => 10,
        ];
    }
}
