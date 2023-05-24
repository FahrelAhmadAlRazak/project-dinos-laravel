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
            $table->foreignId('id_toko');
            $table->foreignId('id_produk');
            $table->foreignId('id_status_pengiriman');
            $table->foreignId('id_kurir');
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
