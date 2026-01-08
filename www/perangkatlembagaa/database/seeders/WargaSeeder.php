<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 50; $i++) {

            $jk = $faker->randomElement(['Laki-laki', 'Perempuan']);

            Warga::create([
                'nama'           => $faker->name($jk == 'Laki-laki' ? 'male' : 'female'),
                'nik'            => $faker->numerify('################'),
                'no_kk'          => $faker->numerify('################'),
                'jenis_kelamin'  => $jk,
                'tanggal_lahir'  => $faker->dateTimeBetween('-60 years', '-17 years'),
                'alamat'         => 'Jl. ' . $faker->streetName . ' No. ' . rand(1,200),
                'rt'             => rand(1,20),
                'rw'             => rand(1,20),
                'kode_pos'       => $faker->postcode,
                'pendidikan'     => $faker->randomElement([
                    'SD', 'SMP', 'SMA', 'SMK', 'D3', 'S1', 'S2'
                ]),
                'pekerjaan'      => $faker->randomElement([
                    'Petani', 'Guru', 'Wiraswasta', 'Karyawan', 'Ibu Rumah Tangga',
                    'Nelayan', 'Pedagang', 'Perangkat Desa'
                ]),
                'status_keluarga' => $faker->randomElement([
                    'Kepala Keluarga',
                    'Istri',
                    'Anak',
                    'Famili Lain'
                ]),
            ]);
        }
    }
}
