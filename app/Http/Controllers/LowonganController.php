<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\LowonganAngkatan;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\LowonganJurusan;
use App\Models\LowonganProdi;
use Illuminate\Support\Facades\Crypt;

class LowonganController extends Controller
{
    public function daftarLowongan()
    {

        $datas = Lowongan::with('pengguna.prodi', 'pengguna.jurusan', 'prodi.prodi', 'jurusan.jurusan', 'angkatan')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($datas, 200);
    }

    public function daftarLowonganYangBuka()
    {

        $datas = Lowongan::with('pengguna.prodi', 'pengguna.jurusan', 'prodi.prodi', 'jurusan.jurusan', 'angkatan')
            ->where('status', 'buka')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($datas, 200);
    }

    public function daftarLowonganPerekrut($id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['error' => 'Pengguna not found'], 404);
        }

        // Mengambil daftar lowongan yang diposting oleh pengguna tertentu
        $datas = Lowongan::with('pengguna.prodi', 'pengguna.jurusan', 'prodi.prodi', 'jurusan.jurusan', 'angkatan')
            ->where('id_pengguna', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($datas, 200);
    }



    public function getLowongan($id)
    {
        $lowongan = Lowongan::with('pengguna', 'prodi.prodi', 'angkatan')->find($id);
        if (!$lowongan) {
            return response()->json(['error' => 'Profile not found'], 404);
        }
        return response()->json($lowongan, 200);
    }

    public function getLowonganByPt($pt)
    {
        $lowongan = Lowongan::select('*')->join('pengguna', 'lowongan.id_pengguna', '=', 'pengguna.id_pengguna')->where('pengguna.id_pt', $pt)
            ->get();

        return response()->json($lowongan, 200);
    }

    public function createLowongan(Request $request, $id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }
        // Validasi input
        $request->validate([
            'deskripsi' => 'required',
            'posisi' => 'required',
            'kompetisi' => 'required',
            'deskripsi_kerja' => 'required',
            'jurusan.*' => 'required',
            'prodi.*' => 'required',
            'angkatan.*' => 'required',
        ]);

        // Buat lowongan baru
        $lowongan = Lowongan::create([
            'deskripsi' => $request->deskripsi,
            'posisi' => $request->posisi,
            'kompetisi' => $request->kompetisi,
            'deskripsi_kerja' => $request->deskripsi_kerja,
            'id_pengguna' => $pengguna->id_pengguna,
        ]);

        foreach ($request->jurusan as $key => $jurusan) {
            LowonganJurusan::create([
                'id_lowongan' => $lowongan->id_lowongan,
                'id_jurusan' => $jurusan,
            ]);
        }

        foreach ($request->prodi as $key => $prodi) {
            LowonganProdi::create([
                'id_lowongan' => $lowongan->id_lowongan,
                'id_prodi' => $prodi,
            ]);
        }

        foreach ($request->angkatan as $key => $angkatan) {
            LowonganAngkatan::create([
                'id_lowongan' => $lowongan->id_lowongan,
                'angkatan' => $angkatan,
            ]);
        }

        return response()->json(['message' => 'Lowongan berhasil dibuat']);
    }

    public function tutupLowongan($id){
        $lowongan = Lowongan::find($id);

        if (!$lowongan) {
            return response()->json(['message' => 'lowongan tidak ditemukan'], 404);
        }

        $lowongan->status = 'tutup';
        $lowongan->save();

        return response()->json(['message' => 'Lowongan berhasil ditutup']);

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
