<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\place;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\place::factory(30)->create();
    }
}
