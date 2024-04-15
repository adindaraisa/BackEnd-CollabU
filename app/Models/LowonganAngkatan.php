<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LowonganAngkatan extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'lowongan_angkatan';
    public $timestamps = false;
    protected $fillable = [
        'id_lowongan', 
        'angkatan'
    ];


    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan','id_lowongan');
    }
}
