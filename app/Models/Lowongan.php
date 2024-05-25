<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lowongan extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'lowongan';
    protected $primaryKey = 'id_lowongan';

    protected $fillable = [
        'id_pengguna',
        'deskripsi',
        'posisi',
        'kompetisi',
        'deskripsi_kerja',
        'tgl_posting',
        'tgl_edit'
    ];


    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna');
    }

    public function jurusan(): HasMany
    {
        return $this->hasMany(LowonganJurusan::class, 'id_lowongan', 'id_lowongan');
    }

    public function angkatan(): HasMany
    {
        return $this->hasMany(LowonganAngkatan::class, 'id_lowongan', 'id_lowongan');
    }

    public function prodi(): HasMany
    {
        return $this->hasMany(LowonganProdi::class, 'id_lowongan', 'id_lowongan');
    }

    public function pelamar(): HasMany
    {
        return $this->hasMany(Pelamar::class, 'id_lowongan', 'id_lowongan');
    }
}
