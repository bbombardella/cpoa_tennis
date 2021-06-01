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
