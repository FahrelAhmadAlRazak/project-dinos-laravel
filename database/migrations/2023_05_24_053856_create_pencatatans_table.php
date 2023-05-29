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
        Schema::create('pencatatans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('pengeluaran_bahan_baku');
            $table->bigInteger('pengeluaran_produksi');
            $table->bigInteger('pengeluaran_kemasan');
            $table->bigInteger('pengeluaran_transportasi');
            $table->bigInteger('pengeluaran_gaji');
            $table->bigInteger('pengeluaran_lainnya');
            $table->bigInteger('total_pengeluaran');
            $table->bigInteger('pemasukan');
            $table->bigInteger('profit');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pencatatans');
    }
};
