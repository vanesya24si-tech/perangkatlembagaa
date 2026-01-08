<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\LembagaDesa;
use App\Models\Media;

class LembagaDesaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $daftarLembaga = [
            'BPD - Badan Permusyawaratan Desa',
            'LPM - Lembaga Pemberdayaan Masyarakat',
            'PKK - Pemberdayaan Kesejahteraan Keluarga',
            'Karang Taruna',
            'RT/RW',
            'Posyandu',
            'Linmas',
            'TPPK Desa',
        ];

        foreach ($daftarLembaga as $nama) {

            $lembaga = LembagaDesa::create([
                'nama_lembaga' => $nama,
                'deskripsi'    => $faker->paragraph(3),
                'kontak'       => $faker->phoneNumber(),
            ]);

            // Optional: Generate logo lembaga
            Media::create([
                'ref_table' => 'lembaga_desa',
                'ref_id'    => $lembaga->lembaga_id,
                'file_url'  => 'storage/uploads/logo/default.png', // bisa kamu ganti gambar asli
                'mime_type' => 'image/png',
                'caption'   => 'Logo ' . $nama,
                'sort_order'=> 1
            ]);
        }
    }
}
