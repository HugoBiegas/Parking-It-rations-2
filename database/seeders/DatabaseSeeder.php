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
        for ($i=0; $i < 30; $i++) { 
            $place = places::create([
            'nomPlace'=>'null',
            ]);
        }
    }
}
