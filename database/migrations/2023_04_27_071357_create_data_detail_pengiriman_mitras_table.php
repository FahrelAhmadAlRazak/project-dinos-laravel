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
        Schema::create('data_detail_pengiriman_mitra', function (Blueprint $table) {
            $table->id('id_detail_pengiriman_mitra');
            $table->integer('jumlah_produk');
            $table->unsignedBigInteger('id_pengiriman_mitra');
            $table->foreign('id_pengiriman_mitra')->references('id_pengiriman_mitra')->on('data_pengiriman_mitra');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id_produk')->on('data_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_detail_pengiriman_mitra');
    }
};
