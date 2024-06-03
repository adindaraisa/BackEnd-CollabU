<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function getJurusan()
    {

        $datas = Jurusan::orderBy('nama_jurusan', 'asc')
            ->get();

        return response()->json($datas, 200);
    }
}
