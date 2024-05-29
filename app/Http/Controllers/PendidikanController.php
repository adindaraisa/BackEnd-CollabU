<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Pendidikan;
use App\Models\Pengguna;
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
        $pendidikan = Pendidikan::create([
            'id_profil' => $profil->id_profil,
            'id_jurusan' => $request->id_jurusan,
            'id_prodi' => $request->id_prodi,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        $pengguna = Pengguna::find($$profil->id_pengguna);
        $pengguna->id_jurusan = $pendidikan->id_jurusan;
        $pengguna->id_prodi = $pendidikan->id_prodi;
        $pengguna->save();

        return response()->json(['message' => 'Pendidikan berhasil dibuat']);
    }

    public function getPendidikan($id_profil){
        $profil = Pendidikan::with(['jurusan', 'prodi'])->find($id_profil);
        if (!$profil) {
            return response()->json(['error' => 'Profile not found'], 404);
        }
        return response()->json($profil, 200);
    }

    public function editPendidikan(Request $request, $id) {
        $profil = Profil::find($id);

        if (!$profil) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        }
        
        $pendidikan = Pendidikan::where('id_profil', $profil->id_profil)->first();

        if (!$pendidikan) {
            return response()->json(['message' => 'Pendidikan tidak ditemukan'], 404);
        }
        
        $request->validate([
            'id_jurusan' => 'required',
            'id_prodi' => 'required',
            'tahun_masuk' => 'required',
        ]);

        $pendidikan->id_jurusan = $request->id_jurusan;
        $pendidikan->id_prodi = $request->id_prodi;
        $pendidikan->tahun_masuk = $request->tahun_masuk;
        $pendidikan->save();
        
    }

    public function deletePendidikan($id)
    {
        $pendidikan = Pendidikan::find($id);

        if (!$pendidikan) {
            return response()->json(['message' => 'pendidikan tidak ditemukan'], 404);
        }

        $pendidikan->delete();

        return response()->json(['message' => 'pendidikan berhasil dihapus']);
    }

}
