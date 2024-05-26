<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use App\Models\Profil;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function createPrestasi(Request $request, $id){

        $profil = Profil::find($id);

        if (!$profil) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        } 

        $request->validate([
            'nama_penghargaan' => 'required',
            'kategori' => 'required',
            'tahun' => 'required',
        ]);

        // Buat koordinator baru
        Prestasi::create([
            'id_profil' => $profil->id_profil,
            'nama_penghargaan' => $request->nama_penghargaan,
            'kategori' => $request->kategori,
            'tahun' => $request->tahun,
        ]);

        return response()->json(['message' => 'Prestasi berhasil dibuat']);
    }

    public function editPrestasi(Request $request, $id) {
        $prestasi = Prestasi::find($id);

        if (!$prestasi) {
            return response()->json(['message' => 'Prestasi tidak ditemukan'], 404);
        }
        
        $request->validate([
            'nama_penghargaan' => 'required',
            'kategori' => 'required',
            'tahun' => 'required',
        ]);

        $prestasi->nama_penghargaan = $request->nama_penghargaan;
        $prestasi->kategori = $request->kategori;
        $prestasi->tahun = $request->tahun;
        $prestasi->save();

        return response()->json(['message' => 'Prestasi berhasil diperarui']);
        
    }

}
