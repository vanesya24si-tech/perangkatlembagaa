<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Warga;
use App\Models\LembagaDesa;
use App\Models\JabatanLembaga;

class AnggotaLembaga extends Model
{
    use HasFactory;

    protected $table = 'anggota_lembaga';
    protected $primaryKey = 'anggota_id';

    protected $fillable = [
        'lembaga_id',
        'warga_id',
        'jabatan_id',
        'tgl_mulai',
        'tgl_selesai',
    ];

    // RELASI KE WARGA
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'id');
    }

    // RELASI KE LEMBAGA
    public function lembaga()
    {
        return $this->belongsTo(LembagaDesa::class, 'lembaga_id', 'lembaga_id');
    }

    // RELASI KE JABATAN
    public function jabatan()
    {
        return $this->belongsTo(JabatanLembaga::class, 'jabatan_id', 'jabatan_id');
    }
    
}
