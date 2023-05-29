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
        Schema::create('toko_produks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('stok_produk');
            $table->bigInteger('total_penjualan');
            $table->unsignedBigInteger('id_toko');
            $table->foreign('id_toko')->references('id')->on('tokos');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko_produks');
    }
};