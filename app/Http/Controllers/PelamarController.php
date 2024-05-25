<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Pelamar;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function getDetailPelamar($id_pelamar){
        $pelamar = Pelamar::with('pengguna.profil.pendidikan', 'pengguna.profil.keahlian', 'pengguna.profil.prestasi', 'pengguna.profil.pengalaman', 'pengguna.jurusan')->find($id_pelamar);

        if (!$pelamar) {
            return response()->json(['error' => 'Pelamar tidak ditemukan'], 404);
        }
        return response()->json($pelamar, 200);
    }

    public function getPelamar($id_pelamar){
        $pelamar = Pelamar::with('pengguna.profil.pendidikan', 'pengguna.profil.keahlian', 'pengguna.profil.prestasi', 'pengguna.profil.pengalaman', 'pengguna.jurusan')->get();

        return response()->json($pelamar, 200);
    }

    public function terimaPelamar($id){
        $pelamar = Pelamar::find($id);

        if (!$pelamar) {
            return response()->json(['message' => 'Pelamar tidak ditemukan'], 404);
        }

        $pelamar->status = 'diterima';
        $pelamar->save();

        return response()->json(['message' => 'Status pelamar berhasil dirubah']);
    }

    public function tolakPelamar($id){
        $pelamar = Pelamar::find($id);

        if (!$pelamar) {
            return response()->json(['message' => 'Pelamar tidak ditemukan'], 404);
        }

        $pelamar->status = 'ditolak';
        $pelamar->save();

        return response()->json(['message' => 'Status pelamar berhasil dirubah']);
    }

    public function createPelamar(Request $request){

        $request->validate([
            'id_pengguna' => 'required',
            'id_lowongan' => 'required',
        ]);

        $pengguna = Pengguna::find($request->id_pengguna);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $lowongan = Lowongan::find($request->id_lowongan);

        if (!$lowongan) {
            return response()->json(['message' => 'Lowongan tidak ditemukan'], 404);
        }

        Pelamar::create([
            'id_pengguna' => $pengguna->id_pengguna,
            'id_lowongan' => $lowongan->id_lowongan,
            'status' => 'diproses',
        ]);

        return response()->json(['message' => 'Pelamar berhasil melamar']);

    }
}
