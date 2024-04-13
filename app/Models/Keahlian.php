<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keahlian extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'keahlian';
    public $timestamps = false;
    protected $fillable = [
        'id_profil', 
        'keahlian',
    ];


    public function profil(): BelongsTo
    {
        return $this->belongsTo(Profil::class, 'id_profil','id_profil');
    }
}
