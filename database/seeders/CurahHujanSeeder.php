<?php

namespace Database\Seeders;

use App\Models\CurahHujan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CurahHujanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $namaBulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        $faker = Faker::create('id_ID');
        for($i=1;$i<=28;$i++){
            CurahHujan::create([
                'id_stasiun' => $i,
                'ch_volume' => mt_rand(80, 230),
                'ch_tahun' => mt_rand(2020, 2021),
                'ch_bulan' => $namaBulan[mt_rand(0, 11)],
            ]);
        }
    }
}
