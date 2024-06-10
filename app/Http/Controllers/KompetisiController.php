<?php

namespace App\Http\Controllers;

use App\Models\Kompetisi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class KompetisiController extends Controller
{
    public function createInformasiKompetisi(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_kompetisi' => 'required',
            'deskripsi' => 'required',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'poster' => 'required|image',
        ]);

        $kompetisi = Kompetisi::create([
            'nama_kompetisi' => $request->nama_kompetisi,
            'deskripsi' => $request->deskripsi,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'poster' => $request->poster,
        ]);

        return response()->json(['message' => 'Informasi Kompetisi berhasil dibuat']);
    }

    public function getInformasiKompetisi(){
        $datas = Kompetisi::orderBy('created_at', 'asc')->get();
    
        // Format tanggal untuk setiap data
        $formattedDatas = $datas->map(function($data) {
            $data->tgl_mulai = Carbon::parse($data->tgl_mulai)->translatedFormat('d F Y');
            $data->tgl_selesai = Carbon::parse($data->tgl_selesai)->translatedFormat('d F Y');
            return $data;
        });
    
        return response()->json($formattedDatas, 200);
    }

    public function getImage($id)
    {
        // Pastikan path sesuai dengan struktur penyimpanan Anda
        $kompetisi = Kompetisi::find($id);

        if (!$kompetisi) {
            return response()->json(['message' => 'Pengguna tidak ditemukan'], 404);
        }

        $path = $kompetisi->poster; 

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
}
