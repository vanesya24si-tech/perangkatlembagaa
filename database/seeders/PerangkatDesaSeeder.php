<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PerangkatDesa;
use App\Models\Warga;
use Faker\Factory as Faker;

class PerangkatDesaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua warga yang tersedia
        $wargaList = Warga::pluck('id')->toArray();

        if (count($wargaList) == 0) {
            $this->command->info('⚠️ Tidak ada data warga. Jalankan WargaSeeder dulu!');
            return;
        }

        $jabatans = [
            'Kepala Desa',
            'Sekretaris Desa',
            'Kaur Keuangan',
            'Kasi Pemerintahan',
            'Kasi Pelayanan',
            'Kaur Umum',
            'Kadus I',
            'Kadus II',
            'Kadus III'
        ];

        for ($i = 0; $i < 20; $i++) {

            $mulai = $faker->dateTimeBetween('-5 years', 'now');
            $selesai = rand(0,1) ? $faker->dateTimeBetween($mulai, 'now') : null;

            PerangkatDesa::create([
                'warga_id'        => $faker->randomElement($wargaList),
                'jabatan'         => $faker->randomElement($jabatans),
                'nip'             => $faker->numerify('##################'),
                'kontak'          => $faker->phoneNumber(),
                'periode_mulai'   => $mulai,
                'periode_selesai' => $selesai,
            ]);
        }
    }
}
