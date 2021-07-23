<?php

namespace Database\Seeders;

use App\Models\KepadatanPenduduk;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class KepadatanPendudukSeeder extends Seeder
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
            KepadatanPenduduk::create([
                'id_kelurahan' => $i,
                'id_kecamatan' => mt_rand(1, 28),
                'kepadatan_penduduk' => mt_rand(10, 100),
                'jumlah_penduduk' => mt_rand(2000, 8000),
                'kepadatan_tahun' => 2021,
            ]);
        }
    }
}
