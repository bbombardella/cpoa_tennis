<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TournoisJoueur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournoisjoueur', function (Blueprint $table) {
            $table->unsignedBigInteger('idJoueur');
            $table->unsignedBigInteger('idTournois');
            $table->foreign('idTournois')->references('id')->on('tournois');
            $table->foreign('idJoueur')->references('id')->on('joueur');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournoisjoueur');
    }
}
