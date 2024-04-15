<?php

use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PengalamanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PrestasiController;

Route::get('/daftar-pengguna', [PenggunaController::class, 'readPengguna']);
Route::post('/daftar', [PenggunaController::class, 'daftarPengguna']);
Route::delete('/delete-akun/{id}', [PenggunaController::class, 'deletePengguna']);
Route::put('/lengkapi-akun/{id}', [PenggunaController::class, 'lengkapiDataPengguna']);

Route::get('/profil/{id}', [ProfilController::class, 'getProfil']);
Route::put('/profil/tentang-saya/{id}', [ProfilController::class, 'tambahTentangSaya']);

Route::post('/profil/pendidikan/{id}', [PendidikanController::class, 'createPendidikan']);

Route::post('/profil/prestasi/{id}', [PrestasiController::class, 'createPrestasi']);

Route::post('/profil/pengalaman/{id}', [PengalamanController::class, 'createPengalaman']);

Route::post('/profil/keahlian/{id}', [KeahlianController::class, 'createKeahlian']);

Route::get('/daftar-lowongan', [LowonganController::class, 'daftarLowongan']);
Route::post('/lowongan/{id}', [LowonganController::class, 'createLowongan']);