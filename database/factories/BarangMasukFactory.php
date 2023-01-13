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
            'barang_id' => mt_rand(1,9),
            'kode_barang' => fake()->unique()->bothify('KK??#?##?#??#?###?'),
            'nama_barang' => 'Barang' . mt_rand(1,100),
            'tanggal_masuk' => fake()->dateTimeInInterval('-1 week', '+7 days'),
            'jumlah_masuk' => mt_rand(1,3),
        ];
    }
}
