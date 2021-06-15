<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Match extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('numeroDeMatch');
            $table->unsignedBigInteger('idStatut');
            $table->unsignedBigInteger('idTour');
            $table->foreign('idStatut')->references('id')->on('statut');
            $table->foreign('idTour')->references('id')->on('tour');
            $table->unsignedBigInteger('joueur1');
            $table->unsignedBigInteger('joueur2');
            $table->foreign('joueur1')->references('id')->on('joueur');
            $table->foreign('joueur2')->references('id')->on('joueur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
