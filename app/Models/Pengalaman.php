<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengalaman extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'pengalaman';
    protected $fillable = [
        'id_profil', 
        'posisi',
        'perusahaan',
        'tgl_mulai',
        'tgl_selesai' 
    ];

    public function profil(): BelongsTo
    {
        return $this->belongsTo(Profil::class, 'id_profil','id_profil');
    }
}
