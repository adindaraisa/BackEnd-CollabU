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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->bigIncrements('id_lowongan');
            $table->text('deskripsi');
            $table->string('posisi');
            $table->string('kompetisi');
            $table->text('deskripsi_kerja');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->onDelete('set null');
            $table->foreignId('id_pengguna')->nullable();
            $table->date('tgl_posting')->default(now());
            $table->date('tgl_edit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan');
    }
};
