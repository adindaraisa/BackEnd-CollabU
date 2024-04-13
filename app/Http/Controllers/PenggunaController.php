<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function daftarPengguna(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|unique:pengguna',
            'password' => 'required',
            'nama_lengkap' => 'required|regex:/^[a-zA-Z\s]+$/',
            'id_pt' =>'required',
        ], [
            'email.unique' => 'email sudah digunakan.',
            'nama_lengkap.regex' => 'Nama hanya boleh diisi dengan huruf.',
        ]);

        $pengguna = Pengguna::create([
            'email' => $request->email,
            'password' => Crypt::encryptString($request->password),
            'nama_lengkap' => $request->nama_lengkap,   
            'id_pt' => $request->id_pt,
        ]);

        Profil::create([
            'id_pengguna' => $pengguna->id_pengguna,
        ]);


        return response()->json(['message' => 'Akun berhasil dibuat']);
    }

    public function readPengguna()
    {

        $datas = Pengguna::with('PerguruanTinggi')->get();
    
        return response()->json($datas, 200);
    }

    public function deletePengguna($id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $pengguna->delete();

        return response()->json(['message' => 'Pengguna berhasil dihapus']);
    }

    public function lengkapiDataPengguna(Request $request, $id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        } 

        $request->validate([
            'email' => 'required',
            'nama_lengkap' => 'required|regex:/^[a-zA-Z\s]+$/',
            'nama_panggilan' => 'required|regex:/^[a-zA-Z\s]+$/',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'no_telp' => 'required|regex:/^\d+$/',
        ], [
            'nama_lengkap.regex' => 'Nama hanya boleh diisi dengan huruf.',
            'nama_panggilan.regex' => 'Nama hanya boleh diisi dengan huruf.',
            'no_telp.regex' => 'No telepon hanya boleh diisi dengan angka.', 
        ]);


        $pengguna->update([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'nama_panggilan' => $request->nama_panggilan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp, // Tambahkan nomor telepon
        ]);

        return response()->json(['message' => 'Pengguna berhasil diperbaharui']);
    }

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
