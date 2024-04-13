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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profil');
            $table->foreign('id_profil')->references('id_profil')->on('profil')->onDelete('cascade');
            $table->foreignId('id_jurusan')->nullable();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('set null');
            $table->foreignId('id_prodi')->nullable();
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')->onDelete('set null');
            $table->string('tahun_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
