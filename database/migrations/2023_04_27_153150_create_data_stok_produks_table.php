<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_stok_produk', function (Blueprint $table) {
            $table->id('id_stok_produk');
            $table->integer('jumlah_stok_tersedia');
            $table->integer('jumlah_stok_terjual');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('data_produk');
            $table->unsignedBigInteger('id_perusahaan_foreign');
            $table->foreign('id_perusahaan_foreign')->references('id_perusahaan')->on('data_perusahaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_stok_produk');
    }
};
