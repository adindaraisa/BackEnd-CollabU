<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LowonganJurusan extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'lowongan_jurusan';
    public $timestamps = 'false';
    protected $fillable = [
        'id_lowongan', 
        'id_jurusan'
    ];


    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan','id_lowongan');
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan','id_jurusan');
    }
}
