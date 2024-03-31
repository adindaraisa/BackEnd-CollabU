<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerguruanTinggi extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'perguruantinggi';
    protected $primaryKey = 'id_perguruan_tinggi';
    protected $fillable = [
        'perguruan_tinggi', 
    ];

    public function Pengguna(): HasOne
    {
        return $this->hasOne(Pengguna::class, 'id_perguruan_tinggi', 'id_perguruan_tinggi');
    }
}

