<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LowonganProdi extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'lowongan_prodi';
    public $timestamps = false;
    protected $fillable = [
        'id_lowongan', 
        'id_prodi'
    ];


    public function lowongan(): BelongsTo
    {
        return $this->belongsTo(Lowongan::class, 'id_lowongan','id_lowongan');
    }

    public function prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'id_prodi','id_prodi');
    }
}
