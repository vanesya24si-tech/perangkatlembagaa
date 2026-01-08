<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;

class LembagaDesa extends Model
{
    use HasFactory;

    protected $table = 'lembaga_desa';
    protected $primaryKey = 'lembaga_id';

    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
        'kontak',
    ];

    // Relasi media (logo lembaga)
    public function media()
    {
        return $this->hasMany(Media::class, 'ref_id', 'lembaga_id')
                    ->where('ref_table', 'lembaga_desa');
    }

    // Relasi jabatan lembaga
    public function jabatans()
    {
        return $this->hasMany(JabatanLembaga::class, 'lembaga_id', 'lembaga_id');
    }

    // Relasi anggota lembaga
    public function anggotas()
    {
        return $this->hasMany(AnggotaLembaga::class, 'lembaga_id', 'lembaga_id');
    }
}
