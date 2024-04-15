<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prodi extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $fillable = [
        'id_jurusan', 
        'nama_prodi'
    ];

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }

    public function lowonganprodi(): HasMany
    {
        return $this->hasMany(lowonganprodi::class, 'id_prodi', 'id_prodi');
    }
}
