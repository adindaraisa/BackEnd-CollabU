<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestasi extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'prestasi';
    protected $fillable = [
        'id_profil', 
        'nama_penghargaan',
        'kategori',
        'tahun' 
    ];

    public function profil(): BelongsTo
    {
        return $this->belongsTo(Profil::class, 'id_profil','id_profil');
    }
}
