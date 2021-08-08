<?php

namespace Database\Seeders;

use App\Models\JenisBencana;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(KecamatanSeeder::class);
        $this->call(SOPSeeder::class);
        $this->call(DetailSopSeeder::class);
        $this->call(DrainaseSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(JenisBencanaSeeder::class);

        $this->call(CurahHujanSeeder::class);
        $this->call(JarakSumberSeeder::class);
        $this->call(KemiringanLahanSeeder::class);
        $this->call(KepadatanPendudukSeeder::class);
        $this->call(StasiunHujanSeeder::class);

    }
}
