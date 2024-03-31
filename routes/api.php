<?php

use App\Http\Controllers\PenggunaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/daftar-pengguna', [PenggunaController::class, 'readPengguna']);
Route::post('/daftar', [PenggunaController::class, 'daftarPengguna']);
