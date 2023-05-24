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
        Schema::create('data_detail_pengiriman_admin', function (Blueprint $table) {
            $table->id('id_detail_pengiriman_admin');
            $table->integer('jumlah_produk');
            $table->unsignedBigInteger('id_pengiriman_admin');
            $table->foreign('id_pengiriman_admin')->references('id_pengiriman_admin')->on('data_pengiriman_admin');
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
        Schema::dropIfExists('data_detail_pengiriman_admin');
    }
};
