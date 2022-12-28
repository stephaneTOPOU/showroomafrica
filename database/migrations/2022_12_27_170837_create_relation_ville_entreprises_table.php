<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelationVilleEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_ville_entreprises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('entreprise_id')->unsigned();
            $table->bigInteger('villes_id')->unsigned();
            $table->timestamps();
            $table->foreign('entreprise_id')->references('id')->on('entreprises')->onDelete('cascade');
            $table->foreign('villes_id')->references('id')->on('villes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relation_ville_entreprises');
    }
}
