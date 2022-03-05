<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            $table->bigInteger('species_id')->unsigned()->index();
            $table->integer('height');
            $table->integer('weight');
            $table->integer('base_experience');
            $table->integer('order');
            $table->boolean('is_default');
            $table->timestamps();

            $table->foreign('species_id')
                  ->references('id')
                  ->on('species')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokemons');
    }
}
