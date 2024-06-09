<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function getProdi()
    {

        $datas = Prodi::orderBy('id_jurusan', 'asc')
            ->get();

        return response()->json($datas, 200);
    }
}
