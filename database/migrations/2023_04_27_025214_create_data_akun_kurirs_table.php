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
        Schema::create('data_akun_kurirs', function (Blueprint $table) {
            $table->id('id_kurir');
            $table->string('nama');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nomor_identitas');
            $table->string('jalan');
            $table->unsignedBigInteger('id_kota');
            $table->foreign('id_kota')->references('id_kota')->on('data_kota');
            $table->unsignedBigInteger('id_provinsi');
            $table->foreign('id_provinsi')->references('id_provinsi')->on('data_provinsi');
            $table->string('no_telpon');
            $table->date('tanggal_lahir');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_akun_kurirs');
    }
};
