<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\JabatanLembaga;
use App\Models\LembagaDesa;

class JabatanLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua lembaga_id dari tabel lembaga_desa
        $lembagaList = LembagaDesa::pluck('lembaga_id')->toArray();

        if (count($lembagaList) == 0) {
            $this->command->warn("⚠️ Tidak ada lembaga. Jalankan LembagaDesaSeeder dulu.");
            return;
        }

        // Daftar jabatan sesuai lembaga desa di Indonesia
        $jabatanList = [
            'Ketua',
            'Wakil Ketua',
            'Sekretaris',
            'Wakil Sekretaris',
            'Bendahara',
            'Wakil Bendahara',
            'Koordinator',
            'Anggota',
            'Penasehat',
        ];

        // Buat 30 jabatan lembaga random
        for ($i = 0; $i < 30; $i++) {

            JabatanLembaga::create([
                'lembaga_id'   => $faker->randomElement($lembagaList),
                'nama_jabatan' => $faker->randomElement($jabatanList),
                'level'        => rand(1, 5),
            ]);
        }

        $this->command->info("👍 Jabatan Lembaga Seeder berhasil dijalankan!");
    }
}
