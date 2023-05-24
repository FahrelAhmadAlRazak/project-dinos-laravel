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
        Schema::create('data_pengiriman_mitra', function (Blueprint $table) {
            $table->id('id_pengiriman_mitra');
            $table->string('jalan');
            $table->unsignedBigInteger('id_kota');
            $table->foreign('id_kota')->references('id_kota')->on('data_kota');
            $table->unsignedBigInteger('id_provinsi');
            $table->foreign('id_provinsi')->references('id_provinsi')->on('data_provinsi');
            $table->unsignedBigInteger('id_mitra');
            $table->foreign('id_mitra')->references('id_mitra')->on('data_akun_mitras');
            $table->unsignedBigInteger('id_status_pengiriman');
            $table->foreign('id_status_pengiriman')->references('id_status_pengiriman')->on('data_status_pengiriman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengiriman_mitra');
    }
};
