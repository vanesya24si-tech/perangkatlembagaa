<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiUmum extends Model
{
    use HasFactory;

    protected $table = 'informasi_umum';

    protected $primaryKey = 'informasi_id';

    public $incrementing = true; // penting
    protected $keyType = 'int';  // penting

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'status'
    ];
}
