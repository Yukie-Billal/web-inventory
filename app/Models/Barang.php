<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama_barang',
        'stok',
    ];

    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
