<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'wargas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'nik',
        'no_kk',
        'jenis_kelamin',
        'tanggal_lahir',
        'alamat',
        'rt',
        'rw',
        'kode_pos',
        'pendidikan',
        'pekerjaan',
        'status_keluarga',
        'foto',
    ];

   protected $casts = [
    'tanggal_lahir' => 'date',
];

    // Relasi: Warga bisa menjadi anggota lembaga
    public function anggota()
    {
        return $this->hasMany(AnggotaLembaga::class, 'warga_id', 'id');
    }
}
