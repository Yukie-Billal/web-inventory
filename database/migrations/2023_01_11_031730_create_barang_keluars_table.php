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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            // $table->bigInteger('barang_id')->unigned()->index();
            $table->foreignId('barang_id')->nullable();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->date('tanggal_keluar');
            $table->integer('jumlah_keluar');
            $table->string('status');
            $table->timestamps();
        });

        // Schema::table('barang_keluars', function ($table) {
        //     $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('casecade')->onUpdate('casecade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_keluars');
    }
};
