<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Favoris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favoris', function (Blueprint $table) {
            $table->unsignedBigInteger('idJoueur');
            $table->unsignedBigInteger('idUser');
            $table->primary(['idUser', 'idJoueur']);
            $table->foreign('idUser')->references('id')->on('users');
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
        Schema::dropIfExists('favoris');
    }
}
