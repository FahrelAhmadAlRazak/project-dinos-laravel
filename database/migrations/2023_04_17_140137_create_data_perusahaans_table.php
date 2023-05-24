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
        Schema::create('data_perusahaan', function (Blueprint $table) {
            $table->id('id_perusahaan');
            $table->string('nama_perusahaan');
            $table->string('nomer_izin_usaha');
            $table->string('notelp_perusahaan');
            $table->string('email_perusahaan')->unique();
            $table->string('jalan');
            $table->unsignedBigInteger('id_kota');
            $table->foreign('id_kota')->references('id_kota')->on('data_kota');
            $table->unsignedBigInteger('id_provinsi');
            $table->foreign('id_provinsi')->references('id_provinsi')->on('data_provinsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_perusahaan');
    }
};
