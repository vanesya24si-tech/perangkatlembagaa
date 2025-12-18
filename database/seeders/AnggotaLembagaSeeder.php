<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\AnggotaLembaga;
use App\Models\LembagaDesa;
use App\Models\Warga;
use App\Models\JabatanLembaga;

class AnggotaLembagaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua data relasi
        $lembagaList  = LembagaDesa::pluck('lembaga_id')->toArray();
        $wargaList    = Warga::pluck('id')->toArray();
        $jabatanList  = JabatanLembaga::pluck('jabatan_id')->toArray();

        // Validasi dulu
        if (empty($lembagaList) || empty($wargaList) || empty($jabatanList)) {
            $this->command->warn("⚠️ Seeder gagal: pastikan lembaga, jabatan, dan warga sudah ada!");
            return;
        }

        // Buat 40 data anggota lembaga
        for ($i = 0; $i < 40; $i++) {

            $mulai   = $faker->dateTimeBetween('-5 years', 'now');
            $selesai = rand(0, 1) ? $faker->dateTimeBetween($mulai, 'now') : null;

            AnggotaLembaga::create([
                'lembaga_id'   => $faker->randomElement($lembagaList),
                'warga_id'     => $faker->randomElement($wargaList),
                'jabatan_id'   => $faker->randomElement($jabatanList),
                'tgl_mulai'    => $mulai,
                'tgl_selesai'  => $selesai,
            ]);
        }

        $this->command->info("🎉 Seeder Anggota Lembaga berhasil dijalankan!");
    }
}
