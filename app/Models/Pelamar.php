<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelamar extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'pelamar';
    protected $primaryKey = 'id_pelamar';
    protected $fillable = [
        'id_pengguna', 
        'id_lowongan',
        'status'
    ];

    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan','id_lowongan');
    }

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna','id_pengguna');
    }
}
