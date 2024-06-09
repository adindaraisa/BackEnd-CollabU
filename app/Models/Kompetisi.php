<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kompetisi extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'kompetisi';

    protected $fillable = [
        'nama_kompetisi',
        'deskripsi',
        'poster',
        'tgl_mulai',
        'tgl_selesai',
    ];
}
