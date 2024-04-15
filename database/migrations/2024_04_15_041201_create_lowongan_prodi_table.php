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
        Schema::create('lowongan_prodi', function (Blueprint $table) {
            $table->id();
            $table->foreign('id_lowongan')->references('id_lowongan')->on('lowongan')->onDelete('cascade');
            $table->foreignId('id_lowongan')->nullable();
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')->onDelete('set null');
            $table->foreignId('id_prodi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan_prodi');
    }
};
