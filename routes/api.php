<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\JurusanController;
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
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\ResumeController;

Route::post('/login', [AuthenticationController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthenticationController::class, 'logout']);

Route::get('/daftar-pengguna', [PenggunaController::class, 'readPengguna']);
Route::get('/pengguna/{id}', [PenggunaController::class, 'getPenggunabyId']);
Route::post('/daftar', [PenggunaController::class, 'daftarPengguna']);
Route::delete('/delete-akun/{id}', [PenggunaController::class, 'deletePengguna']);
Route::put('/lengkapi-akun/{id}', [PenggunaController::class, 'lengkapiDataPengguna']);
Route::post('/foto-profil/unggah/{id}', [PenggunaController::class, 'uploadFotoProfil']);
Route::get('/foto-profil/{id}', [PenggunaController::class, 'getImage']);
Route::post('/resume/{id}', [ResumeController::class, 'uploadResume']);
Route::get('/lihat-resume/{id}', [ResumeController::class, 'getResume']);

Route::get('/profil/{id}', [ProfilController::class, 'getProfil']);
Route::get('/daftar-profil', [ProfilController::class, 'getDaftarProfil']);
Route::put('/profil/tentang-saya/{id}', [ProfilController::class, 'tambahTentangSaya']);
Route::get('/cek-profil/{id}', [ProfilController::class, 'cekKelengkapanProfil']);

Route::post('/profil/pendidikan/{id}', [PendidikanController::class, 'createPendidikan']);
Route::get('/profil/pendidikan/{id}', [PendidikanController::class, 'getPendidikan']);
Route::put('/profil/pendidikan/edit/{id}', [PendidikanController::class, 'editPendidikan']);
Route::delete('/profil/pendidikan/hapus/{id}', [PendidikanController::class, 'deletePendidikan']);

Route::post('/profil/prestasi/{id}', [PrestasiController::class, 'createPrestasi']);
Route::put('/profil/prestasi/edit/{id}', [PrestasiController::class, 'editPrestasi']);
Route::delete('/profil/prestasi/hapus/{id}', [PrestasiController::class, 'deletePrestasi']);

Route::post('/profil/pengalaman/{id}', [PengalamanController::class, 'createPengalaman']);
Route::put('/profil/pengalaman/edit/{id}', [PengalamanController::class, 'editPengalaman']);
Route::delete('/profil/pengalaman/hapus/{id}', [PengalamanController::class, 'deletePengalaman']);

Route::post('/profil/keahlian/{id}', [KeahlianController::class, 'createKeahlian']);
Route::delete('/profil/keahlian/hapus/{id}', [KeahlianController::class, 'deleteKeahlian']);

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
Route::get('/pelamar/lowongan/ditolak/{id}', [PelamarController::class, 'daftarPelamarDitolak']);
Route::get('/pelamar/lowongan/diterima/{id}', [PelamarController::class, 'daftarPelamarDiterima']);

Route::get('/jurusan', [JurusanController::class, 'getJurusan']);
Route::get('/prodi', [ProdiController::class, 'getProdi']);