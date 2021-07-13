<?php

namespace Database\Seeders;

use App\Models\JenisBencana;
use Illuminate\Database\Seeder;

class JenisBencanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisBencana::insert([
            [
                'id' => 1,
                'nama_bencana' => 'Banjir'
            ],
            [
                'id' => 2,
                'nama_bencana' => 'Longsor'
            ],
            [
                'id' => 3,
                'nama_bencana' => 'Kekeringan'
            ],
            [
                'id' => 4,
                'nama_bencana' => 'Puting Beliung'
            ],
        ]);
    }
}
