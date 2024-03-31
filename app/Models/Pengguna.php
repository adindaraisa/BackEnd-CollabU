<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pengguna extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'users';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = [
        'email', 
        'password', 
        'nama',
        'tahun_masuk',
        'id_jurusan',
        'id_perguruan_tinggi'
    ];

    public function Jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan','id_jurusan');
    }

    public function PerguruanTinggi(): BelongsTo
    {
        return $this->belongsTo(PerguruanTinggi::class, 'id_perguruan_tinggi','id_perguruan_tinggi');
    }
}
