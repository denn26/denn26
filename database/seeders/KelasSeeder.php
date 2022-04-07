<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Kelas::create([
                'jurusan_id' => 1,
                'nama'  => $faker->firstName(),
                'semester'     => $faker->randomElement(['Ganjil', 'Genap']),
                'tahun_ajaran'     => $faker->year(),
            ]);
        }
    }
}
