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
        Schema::create('kantor_admins', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('jalan');
            $table->unsignedBigInteger('id_kota');
            $table->foreign('id_kota')->references('id')->on('kotas');
            $table->unsignedBigInteger('id_provinsi');
            $table->foreign('id_provinsi')->references('id')->on('provinsis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kantor_admins');
    }
};
