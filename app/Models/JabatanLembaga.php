<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanLembaga extends Model
{
    use HasFactory;

    protected $table = 'jabatan_lembaga';
    protected $primaryKey = 'jabatan_id';

    protected $fillable = [
        'lembaga_id',
        'nama_jabatan',
        'level',
    ];

    // Relasi: Jabatan milik 1 Lembaga
    public function lembaga()
    {
        return $this->belongsTo(LembagaDesa::class, 'lembaga_id', 'lembaga_id');
    }

    // Relasi: jabatan punya banyak anggota lembaga
    public function anggota()
    {
        return $this->hasMany(AnggotaLembaga::class, 'jabatan_id', 'jabatan_id');
    }
}
