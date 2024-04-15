<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PerguruanTinggi extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'perguruantinggi';
    protected $primaryKey = 'id_pt';
    protected $fillable = [
        'perguruan_tinggi', 
    ];

    public function pengguna(): HasMany
    {
        return $this->hasMany(Pengguna::class, 'id_pt', 'id_pt');
    }

    public function jurusan(): HasMany
    {
        return $this->hasMany(Jurusan::class, 'id_pt', 'id_pt');
    }

    
}

