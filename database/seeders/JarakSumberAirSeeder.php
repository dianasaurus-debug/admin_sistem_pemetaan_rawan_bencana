<?php

namespace Database\Seeders;

use App\Models\JarakSumberAir;
use Illuminate\Database\Seeder;

class JarakSumberAirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JarakSumberAir::insert([
           [
               'id_kelurahan' => ''
           ]
        ]);
    }
}
