<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Jurusan extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $fillable = [
        'nama_jurusan', 
    ];

    public function pengguna(): HasOne
    {
        return $this->hasOne(Pengguna::class, 'id_jurusan', 'id_jurusan');
    }
}
