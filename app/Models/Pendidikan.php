<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendidikan extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'pendidikan';
    protected $fillable = [
        'id_profil', 
        'id_jurusan',
        'id_prodi',
        'tahun_masuk' 
    ];


    public function profil(): BelongsTo
    {
        return $this->belongsTo(Profil::class, 'id_profil','id_profil');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan','id_jurusan');
    }

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'id_prodi','id_prodi');
    }
}
