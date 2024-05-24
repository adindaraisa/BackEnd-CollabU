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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->bigIncrements('id_pengguna');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_lengkap', 50);
            $table->string('nama_panggilan')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['Pria', 'Wanita'])->nullable();
            $table->string('no_telp', 15)->nullable();
            $table->foreignId('id_pt')->nullable();
            $table->foreign('id_pt')->references('id_pt')->on('perguruantinggi')->onDelete('set null');
            $table->foreignId('id_jurusan')->nullable();
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('set null');
            $table->foreignId('id_prodi')->nullable();
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')->onDelete('set null');
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
