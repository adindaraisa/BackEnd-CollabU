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
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('set null');
            $table->foreignId('id_pengguna')->nullable();
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan')->onDelete('set null');
            $table->foreignId('id_lowongan')->nullable();
            $table->enum('status', ['diproses', 'diterima', 'ditolak'])->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamar');
    }
};
