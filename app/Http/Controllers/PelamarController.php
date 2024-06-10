<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Pelamar;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function getDetailPelamar($id)
    {
        $pelamar = Pelamar::with('pengguna.profil.pendidikan.prodi', 'pengguna.profil.pendidikan.jurusan', 'pengguna.profil.keahlian', 'pengguna.profil.prestasi', 'pengguna.profil.pengalaman')->where('id_pelamar', $id);

        if (!$pelamar) {
            return response()->json(['error' => 'Pelamar tidak ditemukan'], 404);
        }
        return response()->json($pelamar, 200);
    }

    public function getPelamar()
    {
        $pelamar = Pelamar::with('pengguna.profil.pendidikan.prodi', 'pengguna.profil.pendidikan.jurusan', 'pengguna.profil.keahlian', 'pengguna.profil.prestasi', 'pengguna.profil.pengalaman')
            ->get();

        return response()->json($pelamar, 200);
    }

    public function getPelamarbyLowongan($id)
    {
        $pelamar = Pelamar::with('pengguna.profil.pendidikan.prodi', 'pengguna.profil.pendidikan.jurusan', 'pengguna.profil.keahlian', 'pengguna.profil.prestasi', 'pengguna.profil.pengalaman',)
            ->where('id_lowongan', $id)
            ->get();

        return response()->json($pelamar, 200);
    }

    public function terimaPelamar($id)
    {
        $pelamar = Pelamar::find($id);

        if (!$pelamar) {
            return response()->json(['message' => 'Pelamar tidak ditemukan'], 404);
        }

        $pelamar->status = 'diterima';
        $pelamar->save();

        return response()->json(['message' => 'Status pelamar berhasil dirubah']);
    }

    public function tolakPelamar($id)
    {
        $pelamar = Pelamar::find($id);

        if (!$pelamar) {
            return response()->json(['message' => 'Pelamar tidak ditemukan'], 404);
        }

        $pelamar->status = 'ditolak';
        $pelamar->save();

        return response()->json(['message' => 'Status pelamar berhasil dirubah']);
    }

    public function cekSudahDaftar($id_pengguna, $id_lowongan)
    {
        $pengguna = Pengguna::find($id_pengguna);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $lowongan = Lowongan::find($id_lowongan);
        $lowongan->load('pengguna.prodi', 'pengguna.jurusan', 'prodi.prodi', 'jurusan.jurusan', 'angkatan');

        if (!$lowongan) {
            return response()->json(['message' => 'Lowongan tidak ditemukan'], 404);
        }

        $pelamar = Pelamar::where('id_pengguna', $pengguna->id_pengguna)->where('id_lowongan', $lowongan->id_lowongan)->first();

        if ($pelamar) {
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }

    public function createPelamar(Request $request)
    {

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

    public function daftarLowonganDitolak($id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $pelamar = Pelamar::where('id_pengguna', $pengguna->id_pengguna)->where('status', 'ditolak')->get();

        // Inisialisasi array untuk menyimpan id_lowongan
        $idLowonganArray = [];

        // Iterasi setiap pelamar untuk mengambil id_lowongan
        foreach ($pelamar as $p) {
            $idLowonganArray[] = $p->id_lowongan;
        }

        // Dapatkan data lowongan berdasarkan id_lowongan yang ada di idLowonganArray
        $lowongan = Lowongan::whereIn('id_lowongan', $idLowonganArray)->get();
        $lowongan->load('pengguna.prodi', 'pengguna.jurusan', 'prodi.prodi', 'jurusan.jurusan', 'angkatan');

        // Kembalikan data lowongan dalam response JSON
        return response()->json($lowongan, 200);
    }

    public function daftarLowonganDiterima($id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $pelamar = Pelamar::where('id_pengguna', $pengguna->id_pengguna)->where('status', 'diterima')->get();

        // Inisialisasi array untuk menyimpan id_lowongan
        $idLowonganArray = [];

        // Iterasi setiap pelamar untuk mengambil id_lowongan
        foreach ($pelamar as $p) {
            $idLowonganArray[] = $p->id_lowongan;
        }

        // Dapatkan data lowongan berdasarkan id_lowongan yang ada di idLowonganArray
        $lowongan = Lowongan::whereIn('id_lowongan', $idLowonganArray)->get();
        $lowongan->load('pengguna.prodi', 'pengguna.jurusan', 'prodi.prodi', 'jurusan.jurusan', 'angkatan');

        // Kembalikan data lowongan dalam response JSON
        return response()->json($lowongan, 200);
    }

    public function daftarLowonganDiproses($id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $pelamar = Pelamar::where('id_pengguna', $pengguna->id_pengguna)->where('status', 'diproses')->get();

        // Inisialisasi array untuk menyimpan id_lowongan
        $idLowonganArray = [];

        // Iterasi setiap pelamar untuk mengambil id_lowongan
        foreach ($pelamar as $p) {
            $idLowonganArray[] = $p->id_lowongan;
        }

        // Dapatkan data lowongan berdasarkan id_lowongan yang ada di idLowonganArray
        $lowongan = Lowongan::whereIn('id_lowongan', $idLowonganArray)->get();
        $lowongan->load('pengguna.prodi', 'pengguna.jurusan', 'prodi.prodi', 'jurusan.jurusan', 'angkatan');

        // Kembalikan data lowongan dalam response JSON
        return response()->json($lowongan, 200);
    }

    public function daftarPelamarDitolak($id)
    {
        $lowongan = Lowongan::find($id);

        if (!$lowongan) {
            return response()->json(['message' => 'Lowongan tidak ditemukan'], 404);
        }

        $pelamar = Pelamar::with('pengguna')->where('id_lowongan', $lowongan->id_lowongan)
            ->where('status', 'ditolak')
            ->get();

        return response()->json($pelamar, 200);
    }

    public function daftarPelamarDiterima($id)
    {
        $lowongan = Lowongan::find($id);

        if (!$lowongan) {
            return response()->json(['message' => 'Lowongan tidak ditemukan'], 404);
        }

        $pelamar = Pelamar::with('pengguna')->where('id_lowongan', $lowongan->id_lowongan)
            ->where('status', 'diterima')
            ->get();

        return response()->json($pelamar, 200);
    }
}
