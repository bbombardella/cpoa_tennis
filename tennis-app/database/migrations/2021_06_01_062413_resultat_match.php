<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultatMatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultat_match', function (Blueprint $table) {
            $table->unsignedBigInteger('idMatch');
            $table->unsignedInteger('score_gagnant');
            $table->unsignedInteger('score_perdant');
            $table->unsignedBigInteger('gagnant');
            $table->unsignedBigInteger('perdant');
            $table->primary('idMatch');
            $table->foreign('idMatch')->references('id')->on('match');
            $table->foreign('gagnant')->references('id')->on('joueur');
            $table->foreign('perdant')->references('id')->on('joueur');
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
