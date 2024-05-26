<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Pengalaman;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    public function createPengalaman(Request $request, $id){

        $profil = Profil::find($id);

        if (!$profil) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        } 

        $request->validate([
            'posisi' => 'required',
            'perusahaan' => 'required',
            'tgl_mulai' => 'required|date_format:Y-m',
            'tgl_selesai' => 'required|date_format:Y-m',
        ]);

        // Buat koordinator baru
        Pengalaman::create([
            'id_profil' => $profil->id_profil,
            'posisi' => $request->posisi,
            'perusahaan' => $request->perusahaan,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
        ]);

        return response()->json(['message' => 'Pengalaman berhasil dibuat']);
    }

    public function editPengalaman(Request $request, $id) {
        $pengalaman = Pengalaman::find($id);

        if (!$pengalaman) {
            return response()->json(['message' => 'Pendidikan tidak ditemukan'], 404);
        }
        
        $request->validate([
            'posisi' => 'required',
            'perusahaan' => 'required',
            'tgl_mulai' => 'required|date_format:Y-m',
            'tgl_selesai' => 'required|date_format:Y-m',
        ]);

        $pengalaman->posisi = $request->posisi;
        $pengalaman->perusahaan = $request->perusahaan;
        $pengalaman->tgl_mulai = $request->tgl_mulai;
        $pengalaman->tgl_selesai = $request->tgl_selesai;
        $pengalaman->save();

        return response()->json(['message' => 'Pengalaman berhasil diperarui']);
        
    }
}
