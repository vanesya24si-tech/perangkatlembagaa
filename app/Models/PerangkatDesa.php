<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDesa extends Model
{
    use HasFactory;

    protected $table = 'perangkat_desa';
    protected $primaryKey = 'perangkat_id';

    protected $fillable = [
        'warga_id',
        'jabatan',
        'nip',
        'kontak',
        'periode_mulai',
        'periode_selesai',
    ];

    // RELASI KE WARGAS
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'id');
    }

    // 1 FOTO = 1 MEDIA
    public function media()
    {
        return $this->hasOne(Media::class, 'ref_id', 'perangkat_id')
                    ->where('ref_table', 'perangkat_desa');
    }
}
