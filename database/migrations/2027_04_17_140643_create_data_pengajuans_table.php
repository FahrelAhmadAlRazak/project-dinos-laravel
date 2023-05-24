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
        Schema::create('data_pengajuan', function (Blueprint $table) {
            $table->id('id_pengajuan');
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('id_mitra');
            $table->foreign('id_mitra')->references('id_mitra')->on('data_akun_mitras');
            $table->unsignedBigInteger('id_perusahaan_foreign');
            $table->foreign('id_perusahaan_foreign')->references('id_perusahaan')->on('data_perusahaan');
            $table->unsignedBigInteger('id_status_pengajuan');
            $table->foreign('id_status_pengajuan')->references('id_status_pengajuan')->on('data_status_pengajuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengajuan');
    }
};
