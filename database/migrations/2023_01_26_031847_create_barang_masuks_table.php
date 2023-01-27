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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number');
            $table->string('nama_barang');
            $table->string('merek');
            $table->string('warna');
            $table->string('satuan');            
            $table->date('tanggal_masuk');
            $table->integer('qty');
            $table->foreignId('kategori_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('supplier_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete();
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
        Schema::dropIfExists('barang_masuks');
    }
};
