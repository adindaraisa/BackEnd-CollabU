<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'string|required',
            'password' => 'string|required',
        ]);

        // Cek apakah ada sesi aktif
        if (Auth::check()) {
            return response()->json([
                'message' => 'Anda sudah login'
            ], 400);
        }

        // Temukan pengguna berdasarkan email
        $user = Pengguna::where('email', $request->email)->first();

        if ($user) {
            // Dekripsi password dan bandingkan
            $decryptedPassword = Crypt::decryptString($user->password);
            if ($request->password == $decryptedPassword) {
                $pengguna = $user;
                // Login pengguna
                Auth::login($pengguna);

                // Return response
                return response()->json([
                    'message' => 'Berhasil masuk',
                    'user' => $pengguna,
                    'response' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'Password salah'
                ], Response::HTTP_UNAUTHORIZED);
            }
        } else {
            return response()->json([
                'message' => 'Akun tidak ditemukan'
            ], Response::HTTP_NOT_FOUND);
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json([
            'message' => 'Berhasil logout'
        ], Response::HTTP_OK);
    }

}
