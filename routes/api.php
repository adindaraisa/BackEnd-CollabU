<?php

use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PelamarController;
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
Route::get('/daftar-profil', [ProfilController::class, 'getDaftarProfil']);
Route::put('/profil/tentang-saya/{id}', [ProfilController::class, 'tambahTentangSaya']);

Route::post('/profil/pendidikan/{id}', [PendidikanController::class, 'createPendidikan']);
Route::get('/profil/pendidikan/{id}', [PendidikanController::class, 'getPendidikan']);

Route::post('/profil/prestasi/{id}', [PrestasiController::class, 'createPrestasi']);

Route::post('/profil/pengalaman/{id}', [PengalamanController::class, 'createPengalaman']);

Route::post('/profil/keahlian/{id}', [KeahlianController::class, 'createKeahlian']);

Route::get('/daftar-lowongan', [LowonganController::class, 'daftarLowongan']);
Route::get('/daftar-lowongan/{id}', [LowonganController::class, 'daftarLowonganPerekrut']);
Route::get('/lowongan/{id}', [LowonganController::class, 'getLowongan']);
Route::get('/lowongan-pt/{id}', [LowonganController::class, 'getLowonganByPt']);
Route::post('/lowongan/{id}', [LowonganController::class, 'createLowongan']);

Route::post('/daftar-pelamar', [PelamarController::class, 'createPelamar']);
Route::put('/tolak-pelamar/{id}', [PelamarController::class, 'tolakPelamar']);
Route::put('/terima-pelamar/{id}', [PelamarController::class, 'terimaPelamar']);
Route::get('/pelamar/{id}', [PelamarController::class, 'getDetailPelamar']);
Route::get('/pelamar', [PelamarController::class, 'getPelamar']);
Route::get('/pelamar-lowongan/{id}', [PelamarController::class, 'getPelamarbyLowongan']);
