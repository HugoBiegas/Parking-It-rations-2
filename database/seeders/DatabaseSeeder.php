<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\place;
use App\Models\Utilisateurs;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         for ($i=0; $i < 30 ; $i++) { 
            place::create([
                'ProrioActu'=>0,
                'nomPlace'=> "A".$i,
            ]);
         }
    }
}
