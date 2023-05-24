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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('no_identitas');
            $table->string('no_telepon');
            $table->date('tanggal_lahir');
            $table->string('jalan');
            $table->unsignedBigInteger('id_kota');
            $table->foreign('id_kota')->references('id')->on('kotas');
            $table->unsignedBigInteger('id_provinsi');
            $table->foreign('id_provinsi')->references('id')->on('provinsis');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
