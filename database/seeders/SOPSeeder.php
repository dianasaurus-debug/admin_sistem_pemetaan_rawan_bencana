<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\sop;
use Illuminate\Database\Seeder;

class SOPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sop::insert([
            [
                'jenis_sop' => 'Pra Bencana',
                'jenis_bencana' => 0,
            ],
            [
                'jenis_sop' => 'Saat Bencana',
                'jenis_bencana' => 0,
            ],
            [
                'jenis_sop' => 'Pasca Bencana',
                'jenis_bencana' => 0,
            ],
            [
                'jenis_sop' => 'Pra Bencana',
                'jenis_bencana' => 1,
            ],
            [
                'jenis_sop' => 'Saat Bencana',
                'jenis_bencana' => 1,
            ],
            [
                'jenis_sop' => 'Pasca Bencana',
                'jenis_bencana' => 1,
            ],
            [
                'jenis_sop' => 'Pra Bencana',
                'jenis_bencana' => 2,
            ],
            [
                'jenis_sop' => 'Saat Bencana',
                'jenis_bencana' => 2,
            ],
            [
                'jenis_sop' => 'Pasca Bencana',
                'jenis_bencana' => 2,
            ],
            [
                'jenis_sop' => 'Pra Bencana',
                'jenis_bencana' => 3,
            ],
            [
                'jenis_sop' => 'Saat Bencana',
                'jenis_bencana' => 3,
            ],
            [
                'jenis_sop' => 'Pasca Bencana',
                'jenis_bencana' => 3,
            ],
        ]);

    }
}
