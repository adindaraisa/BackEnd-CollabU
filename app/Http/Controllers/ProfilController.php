<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function getProfil($id_profil){
        $profil = Profil::with(['pengguna','pendidikan.prodi', 'pendidikan.jurusan', 'prestasi', 'pengalaman', 'keahlian'])->find($id_profil);
        if (!$profil) {
            return response()->json(['error' => 'Profile not found'], 404);
        }
        return response()->json($profil, 200);
    }


    public function getDaftarProfil(){
        $profil = Profil::with(['pengguna','pendidikan.prodi', 'pendidikan.jurusan', 'prestasi', 'pengalaman', 'keahlian'])->get();

        return response()->json($profil, 200);
    }
    


    public function tambahTentangSaya(Request $request, $id){
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
    
}


