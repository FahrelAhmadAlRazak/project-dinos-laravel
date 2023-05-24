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
        Schema::create('data_artikel', function (Blueprint $table) {
            $table->id('id_artikel');
            $table->string('judul_artikel');
            $table->date('tanggal');
            $table->string('deskripsi');
            $table->string('gambar_artikel');
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id_admin')->on('data_akun_admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_artikel');
    }
};
