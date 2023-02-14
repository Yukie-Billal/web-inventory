<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->unique();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('merek');
            $table->string('warna');
            $table->string('satuan');
            $table->foreignId('kategori_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->string('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
