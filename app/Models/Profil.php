<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profil extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';
    protected $fillable = [
        'id_pengguna', 
        'tentang_saya',
        'resume', 
    ];


    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna','id_pengguna');
    }

    public function pendidikan(): HasOne
    {
        return $this->hasOne(Pendidikan::class, 'id_profil','id_profil');
    }

    public function prestasi(): HasMany
    {
        return $this->hasMany(Prestasi::class, 'id_profil','id_profil');
    }

    public function pengalaman(): HasMany
    {
        return $this->hasMany(Pengalaman::class, 'id_profil','id_profil');
    }

    public function keahlian(): HasMany
    {
        return $this->hasMany(Keahlian::class, 'id_profil','id_profil');
    }
}
