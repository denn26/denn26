<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
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
            $id =  $faker->randomNumber(9);

            User::create([
                'username' => $id,
                'roles_id' => $faker->randomElement(['1', '2', '3']),
                'password' => Hash::make($id),
            ]);

            Siswa::create([
                'nisn' => $id,
                'kelas_id' => 1,
                'nama' => $faker->lastName(),
                'jenis_kelamin' => $faker->randomElement(['pria', 'wanita']),
                'tgl_lahir' => $faker->date(),
                'agama' => 'islam',
                'alamat' => $faker->randomElement(['Jl Rahadi Usman Desa Sungai Besar Kecamatan Matan Hilir Selatan
                ', 'Jl Rahadi Usman Desa Sungai Bakau Kecamatan Matan Hilir Selatan', 'Jl Rahadi Usman Desa Sungai Pelang Kecamatan Matan Hilir Selatan
                ', 'Jl Rahadi Usman Desa Pesaguan Kanan Kecamatan Matan Hilir Selatan
                ']),
                'nama_ayah' =>  $faker->lastName(),
                'nama_ibu' => $faker->lastName()
            ]);
        }
    }
}
