<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasuk>
 */
class BarangMasukFactory extends Factory
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
            'nama_barang' => 'Laptop ' . fake()->unique()->randomNumber(2, false),
            'merek' => 'Asus',
            'warna' => 'Hitam',
            'satuan' => 'Pcs / Buah',
            'kategori_id' => 1,
            'tanggal_masuk' => fake()->dateTimeInInterval('-1 week', '+1 days'),
            'qty' => mt_rand(1,3),
            'supplier_id' => 1
        ];
    }
}
