<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\place;
use App\Models\Utilisateurs;
use Illuminate\Support\Facades\Hash;

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
         $utilisateur = Utilisateurs::create([
            'admin'=>1,
            'email' => 'admin@gmail.com',
            'mot_de_passe' => Hash::make('123'),
            'prénom' => 'root',
            'nom' => 'admin',
            'rangfile'=>0,
            'valider'=>1,
            'date_demande'=>'',
        ]);
        $utilisateur = Utilisateurs::create([
            'admin'=>0,
            'email' => 'admin2@gmail.com',
            'mot_de_passe' => Hash::make('123'),
            'prénom' => 'root',
            'nom' => 'admin',
            'rangfile'=>1,
            'valider'=>1,
            'date_demande'=>'',
        ]);
    }
}
