<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

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

    public function uploadFotoProfil(Request $request, $id)
    {
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $request->validate([
            'foto_profil' => 'required|image',
        ], [
            'foto_profil.required' => 'File foto profil diperlukan.',
            'foto_profil.image' => 'File foto profil harus berupa gambar.',
        ]);

        if ($request->hasFile('foto_profil')) {
            // Hapus foto profil sebelumnya jika ada
            if ($pengguna->foto_profil) {
                Storage::delete($pengguna->foto_profil);
            }

            // Ambil email pengguna dan format nama file
            $email = $pengguna->email;
            $extension = $request->file('foto_profil')->getClientOriginalExtension();
            $fileName = preg_replace('/[^a-zA-Z0-9]/', '_', $email) . '.' . $extension;

            // Simpan file dengan nama yang baru
            $path = $request->file('foto_profil')->storeAs('foto_profil', $fileName);
            $pengguna->foto_profil = $fileName;
            $pengguna->save();

            return response()->json(['message' => 'Foto profil berhasil diunggah']);
        } else {
            return response()->json(['message' => 'Tidak ada file foto profil yang diunggah'], 400);
        }
    }

    public function getImage($id)
    {
        // Pastikan path sesuai dengan struktur penyimpanan Anda
        $pengguna = Pengguna::find($id);

        if (!$pengguna) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $path = $pengguna->foto_profil;

        $path = 'foto_profil/' . $path;

        // Periksa apakah file ada
        if (Storage::exists($path)) {
            // Dapatkan konten gambar
            $content = Storage::get($path);

            // Dapatkan tipe konten
            $mimeType = Storage::mimeType($path);

            // Langsung kembalikan respons HTTP
            return response($content)->header('Content-Type', $mimeType);
        } else {
            // Jika file tidak ditemukan, kembalikan respons 404 (not found)
            return response()->json(['message' => 'File not found'], 404);
        }
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
