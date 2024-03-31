<?php

namespace App\Http\Controllers;

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
            'email' => 'required|unique:users',
            'password' => 'required',
            'nama' => 'required|regex:/^[a-zA-Z\s]+$/',
            'tahun_masuk' =>'required',
            'id_perguruan_tinggi' =>'required',
            'id_jurusan' =>'required',
        ], [
            'email.unique' => 'email sudah digunakan.',
            'nama.regex' => 'Nama hanya boleh diisi dengan huruf.',
        ]);

        // Buat koordinator baru
        Pengguna::create([
            'email' => $request->email,
            'password' => Crypt::encryptString($request->password),
            'nama' => $request->nama,   
            'tahun_masuk' => $request->tahun_masuk,
            'id_perguruan_tinggi' => $request->id_perguruan_tinggi,
            'id_jurusan' => $request->id_jurusan,
        ]);

        return response()->json(['message' => 'Akun berhasil dibuat']);
    }

    public function readPengguna()
    {

        $datas = Pengguna::with(['Jurusan', 'PerguruanTinggi'])->get();
    
        return response()->json($datas, 200);
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
