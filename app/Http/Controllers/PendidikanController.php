<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    public function createPendidikan(Request $request, $id){

        $profil = Profil::find($id);

        if (!$profil) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        } 

        $request->validate([
            'id_jurusan' => 'required',
            'id_prodi' => 'required',
            'tahun_masuk' => 'required',
        ]);

        // Buat koordinator baru
        Pendidikan::create([
            'id_profil' => $profil->id_profil,
            'id_jurusan' => $request->id_jurusan,
            'id_prodi' => $request->id_prodi,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return response()->json(['message' => 'Pendidikan berhasil dibuat']);
    }

    public function getPendidikan($id_profil){
        $profil = Pendidikan::with(['jurusan', 'prodi'])->find($id_profil);
        if (!$profil) {
            return response()->json(['error' => 'Profile not found'], 404);
        }
        return response()->json($profil, 200);
    }

}
