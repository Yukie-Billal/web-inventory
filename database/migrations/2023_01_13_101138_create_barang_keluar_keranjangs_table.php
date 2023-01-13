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
        Schema::create('barang_keluar_keranjangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->nullable();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('jumlah_keluar');
            $table->string('tanggal_keluar');
            $table->string('status');
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
        Schema::dropIfExists('barang_keluar_keranjangs');
    }
};
