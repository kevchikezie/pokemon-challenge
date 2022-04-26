<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            $table->bigInteger('generation_id')->unsigned()->index();
            $table->bigInteger('color_id')->unsigned()->index();
            $table->bigInteger('shape_id')->unsigned()->index();
            $table->bigInteger('habitat_id')->unsigned()->index();
            $table->integer('gender_rate');
            $table->integer('capture_rate');
            $table->integer('base_happiness');
            $table->timestamps();

            $table->foreign('generation_id')
                  ->references('id')
                  ->on('generations')
                  ->onDelete('cascade');

            $table->foreign('color_id')
                  ->references('id')
                  ->on('colors')
                  ->onDelete('cascade');

            $table->foreign('shape_id')
                  ->references('id')
                  ->on('shapes')
                  ->onDelete('cascade');

            $table->foreign('habitat_id')
                  ->references('id')
                  ->on('habitats')
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
        Schema::dropIfExists('species');
    }
}
