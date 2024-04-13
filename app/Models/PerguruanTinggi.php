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
    protected $primaryKey = 'id_pt';
    protected $fillable = [
        'perguruan_tinggi', 
    ];

    public function pengguna(): HasOne
    {
        return $this->hasOne(Pengguna::class, 'id_pt', 'id_pt');
    }

    
}

