<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function uploadResume(Request $request, $id)
    {
        $profil = Profil::find($id);

        if (!$profil) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        }

        $request->validate([
            'resume' => 'required|file|mimes:docx,pdf|max:20480', // maksimal 2MB
        ], [
            'resume.required' => 'File resume diperlukan.',
            'resume.file' => 'File resume harus berupa file.',
            'resume.mimes' => 'File resume harus berupa file dengan ekstensi docx atau pdf.',
            'resume.max' => 'File resume tidak boleh lebih dari 20MB.',
        ]);

        if ($request->hasFile('resume')) {
            // Hapus resume sebelumnya jika ada
            if ($profil->resume) {
                Storage::delete($profil->resume);
            }

            // Ambil email pengguna dan format nama file
            $pengguna = Pengguna::find($id);
            $email = $pengguna->email;
            $extension = $request->file('resume')->getClientOriginalExtension();
            $fileName = preg_replace('/[^a-zA-Z0-9]/', '_', $email) . '.' . $extension;

            // Simpan file dengan nama yang baru
            $path = $request->file('resume')->storeAs('resume', $fileName);
            $profil->resume = $path;
            $profil->save();

            return response()->json(['message' => 'Resume berhasil diunggah']);
        } else {
            return response()->json(['message' => 'Tidak ada file resume yang diunggah'], 400);
        }
    }


    public function getResume($id)
    {
        $profil = Profil::find($id);

        if (!$profil) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        }

        $path = $profil->resume; // Asumsikan ada atribut 'resume_path' pada model Pengguna

        if (empty($path)) {
            return response()->json(['message' => 'File resume tidak ditemukan'], 404);
        }

        // Periksa apakah file ada
        if (Storage::exists($path)) {
            // Dapatkan ekstensi file
            $extension = pathinfo($path, PATHINFO_EXTENSION);

            // Hanya izinkan ekstensi .docx dan .pdf
            if ($extension !== 'docx' && $extension !== 'pdf') {
                return response()->json(['message' => 'File harus berupa dokumen (.docx atau .pdf)'], 400);
            }

            // Dapatkan konten file
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

}
