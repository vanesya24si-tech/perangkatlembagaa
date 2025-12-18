<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InformasiUmumSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('informasi_umum')->insert([
            [
                'judul' => 'Pengumuman Kerja Bakti',
                'isi' => 'Akan dilaksanakan kerja bakti bersama seluruh warga pada hari Minggu.',
                'tanggal' => now(),
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Rapat Lembaga Desa',
                'isi' => 'Rapat koordinasi lembaga desa dilaksanakan di balai desa.',
                'tanggal' => now(),
                'status' => 'aktif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
