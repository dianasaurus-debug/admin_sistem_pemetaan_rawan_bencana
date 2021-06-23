<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kecamatan::insert([
            [
                'kec_nama' => 'Balen',
                'kec_latitude' => '',
                'kec_longitude' => ''
            ]
        ]);
    }
}
