<?php

namespace Database\Seeders;

use App\Models\KemiringanLahan;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KemiringanLahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i=1;$i<=430;$i++){
            KemiringanLahan::create([
                'id_kelurahan' => $i,
                'id_kecamatan' => mt_rand(1, 28),
                'kemiringan_indeks' => mt_rand(10, 30),
            ]);
        }
    }
}
