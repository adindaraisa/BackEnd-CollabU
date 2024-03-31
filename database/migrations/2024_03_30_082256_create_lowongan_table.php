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
            $table->string('peran');
            $table->string('kompetisi');
            $table->text('deskripsi_kerja');
            $table->foreign('id_pembuat')->references('id_pengguna')->on('users')->onDelete('set null');
            $table->foreignId('id_pembuat')->nullable();
            $table->date('tanggal_posting')->default(now());
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
