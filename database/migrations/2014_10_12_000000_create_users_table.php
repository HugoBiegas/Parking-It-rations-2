<?php

use App\Models\Utilisateurs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //test
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->boolean('admin')->default(0);
            $table->string('prénom')->nullable();
            $table->string('nom')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('mot_de_passe');
            $table->Integer('rangfile')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $utilisateur = Utilisateurs::create([
            'admin'=>1,
            'email' => 'admin@gmail.com',
            'mot_de_passe' => Hash::make('123'),
            'prénom' => 'root',
            'nom' => 'admin',
            'ranfile'=>0,
        ]);
        $utilisateur = Utilisateurs::create([
            'admin'=>0,
            'email' => 'admin2@gmail.com',
            'mot_de_passe' => Hash::make('123'),
            'prénom' => 'root',
            'nom' => 'admin',
            'ranfile'=>1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utilisateurs');
    }
}
