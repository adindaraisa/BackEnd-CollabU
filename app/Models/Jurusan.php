<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jurusan extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $fillable = [
        'id_pt',
        'nama_jurusan'
    ];

    public function perguruantinggi(): BelongsTo
    {
        return $this->belongsTo(PerguruanTinggi::class, 'id_pt', 'id_pt');
    }

    public function prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'id_jurusan', 'id_jurusan');
    }
}
