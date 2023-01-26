<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public function Barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function BarangMasuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
}
