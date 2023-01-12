<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangKeluar>
 */
class BarangKeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'kode_keluar' => fake()->unique()->bothify('KK??#?##?#??#?###?'),
            'barang_id' => mt_rand(1,9),
            'tanggal_keluar' => fake()->date('Y-m-d'),
            'jumlah_keluar' => mt_rand(1,3),
            'status' => 'Di Pinjam',
        ];
    }
}
