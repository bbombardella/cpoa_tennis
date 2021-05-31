<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('numeroDuTour');
            $table->unsignedBigInteger('idStatut');
            $table->unsignedBigInteger('idTournois');
            $table->foreign('idTournois')->references('id')->on('tournois');
            $table->foreign('idStatut')->references('id')->on('statut');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour');
    }
}
