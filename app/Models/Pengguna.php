<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pengguna extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    protected $fillable = [
        'email', 
        'password', 
        'nama_lengkap',
        'nama_panggilan',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_telp',
        'id_pt'
    ];


    public function perguruantinggi(): BelongsTo
    {
        return $this->belongsTo(PerguruanTinggi::class, 'id_pt','id_pt');
    }

    public function profil(): HasOne
    {
        return $this->hasOne(Profil::class, 'id_pengguna', 'id_pengguna');
    }
}
