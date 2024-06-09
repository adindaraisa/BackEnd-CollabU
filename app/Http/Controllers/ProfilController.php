<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\Profil;
use App\Models\Pendidikan;
use App\Models\Pengalaman;
use App\Models\Pengguna;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function getProfil($id_profil)
    {
        $profil = Profil::with(['pengguna', 'pendidikan.prodi', 'pendidikan.jurusan.perguruantinggi', 'prestasi', 'pengalaman', 'keahlian'])->find($id_profil);
        if (!$profil) {
            return response()->json(['error' => 'Profile not found'], 404);
        }
        return response()->json($profil, 200);
    }


    public function getDaftarProfil()
    {
        $profil = Profil::with(['pengguna', 'pendidikan.prodi', 'pendidikan.jurusan', 'prestasi', 'pengalaman', 'keahlian'])->get();

        return response()->json($profil, 200);
    }



    public function tambahTentangSaya(Request $request, $id)
    {
        $profil = Profil::find($id);

        if (!$profil) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        }

        $request->validate([
            'tentang_saya' => 'required',
        ]);

        $profil->tentang_saya = $request->tentang_saya;
        $profil->save();

        return response()->json(['message' => 'Tentang saya berhasil ditambahkan']);
    }

    public function cekKelengkapanProfil($id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['error' => 'Pengguna not found'], 404);
        }

        $profil = Profil::where('id_pengguna', $pengguna->id_pengguna)->first();

        if (!$profil) {
            return response()->json(['error' => 'Profile not found'], 404);
        }

        $pendidikan = Pendidikan::where('id_profil', $profil->id_profil)->get();
        $keahlian = Keahlian::where('id_profil', $profil->id_profil)->get();
        $prestasi = Prestasi::where('id_profil', $profil->id_profil)->get();
        $pengalaman = Pengalaman::where('id_profil', $profil->id_profil)->get();
        $resume = $profil->resume;
        $tentang_saya = $profil->tentang_saya;

        // Mengecek kelengkapan profil
        if ($pendidikan->isNotEmpty() && $keahlian->isNotEmpty() && $prestasi->isNotEmpty() && $pengalaman->isNotEmpty() && !empty($resume) && !empty($tentang_saya)) {
            return response()->json(['message' => 'Profil Lengkap']);
        }
}
