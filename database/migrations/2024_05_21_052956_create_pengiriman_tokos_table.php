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
        Schema::create('pengiriman_tokos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('jumlah');
            $table->unsignedBigInteger('id_toko');
            $table->foreign('id_toko')->references('id')->on('tokos');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('produks');
            $table->unsignedBigInteger('id_status_pengiriman');
            $table->foreign('id_status_pengiriman')->references('id')->on('status_pengirimen');
            $table->unsignedBigInteger('id_kurir');
            $table->foreign('id_kurir')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman_tokos');
    }
};