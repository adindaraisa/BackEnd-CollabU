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
            $table->bigIncrements('id_pengguna');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama', 50);
            $table->string('tahun_masuk', 4);
            $table->foreignId('id_perguruan_tinggi')->nullable();
            $table->foreign('id_perguruan_tinggi')->references('id_perguruan_tinggi')->on('perguruantinggi')->onDelete('set null');
            $table->foreignId('id_jurusan')->nullable();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('set null');
            $table->timestamps();
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
