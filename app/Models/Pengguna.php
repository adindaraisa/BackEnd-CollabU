<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'id_pt',
        'id_jurusan',
        'id_prodi',
    ];


    public function perguruantinggi(): BelongsTo
    {
        return $this->belongsTo(PerguruanTinggi::class, 'id_pt', 'id_pt');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
    }

    public function profil(): HasOne
    {
        return $this->hasOne(Profil::class, 'id_pengguna', 'id_pengguna');
    }

    public function lowongan(): HasMany
    {
        return $this->hasMany(Lowongan::class, 'id_pengguna', 'id_pengguna');
    }

    public function pelamar(): HasMany
    {
        return $this->hasMany(Pelamar::class, 'id_pengguna', 'id_pengguna');
    }
}
