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
        Schema::create('pengiriman_admins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_kantor_admin');
            $table->foreign('id_kantor_admin')->references('id')->on('kantor_admins');
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
        Schema::dropIfExists('pengiriman_admins');
    }
};
