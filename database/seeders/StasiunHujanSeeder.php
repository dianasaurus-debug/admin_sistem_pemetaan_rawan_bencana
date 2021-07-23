<?php

namespace Database\Seeders;

use App\Models\StasiunHujan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StasiunHujanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=1;$i<=28;$i++){
            StasiunHujan::create([
               'id_kecamatan' => $i,
                'sh_nama' => $faker->name,
                'sh_nomor' => mt_rand(1000, 2000),
            ]);
        }
    }
}
