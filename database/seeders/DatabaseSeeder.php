<?php

namespace Database\Seeders;

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



    }
}
