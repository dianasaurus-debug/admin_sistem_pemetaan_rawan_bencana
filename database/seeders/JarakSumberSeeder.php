<?php

namespace Database\Seeders;

use App\Models\JarakSumberAir;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class JarakSumberSeeder extends Seeder
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
            JarakSumberAir::create([
                'id_kelurahan' => $i,
                'id_kecamatan' => mt_rand(1, 28),
                'jarak_sumberair' => mt_rand(1, 3),
            ]);
        }
    }
}
