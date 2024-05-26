<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use App\Models\Profil;
use Illuminate\Http\Request;

class KeahlianController extends Controller
{
    public function createKeahlian(Request $request, $id){

        $profil = Profil::find($id);

        if (!$profil) {
            return response()->json(['message' => 'Profil tidak ditemukan'], 404);
        } 

        $request->validate([
            'keahlian' => 'required',
        ]);

        // Buat koordinator baru
        Keahlian::create([
            'id_profil' => $profil->id_profil,
            'keahlian' => $request->keahlian,
        ]);

        return response()->json(['message' => 'Keahlian berhasil dibuat']);
    }

    public function deleteKeahlian($id)
    {
        $keahlian = Keahlian::find($id);

        if (!$keahlian) {
            return response()->json(['message' => 'Keahlian tidak ditemukan'], 404);
        }

        $keahlian->delete();

        return response()->json(['message' => 'Keahlian berhasil dihapus']);
    }
}
