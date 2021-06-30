<?php

namespace Database\Seeders;

use App\Models\Drainase;
use Illuminate\Database\Seeder;

class DrainaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=28;$i++){
            Drainase::create([
               'id_kecamatan' => $i,
               'kapasitas_drainase' => '6400'
            ]);
        }
    }
}
