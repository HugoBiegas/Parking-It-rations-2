<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Historique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Historiques', function (Blueprint $table) {
            $table->id();
            $table->Integer('ProrioActuHisto');
            $table->string('nomPlaceHistorique');
            $table->string('date_debut_reserve');
            $table->string('date_fin_reserve')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Historiques');
    }
}
