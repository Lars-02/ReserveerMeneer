<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieSlotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_slot', function (Blueprint $table) {
            $table->id();
            $table->unique(['cinema_hall_id', 'starting_at']);
            $table->unsignedBigInteger('cinema_hall_id');
            $table->unsignedBigInteger('movie_id');

            $table->dateTime('starting_at');
            $table->timestamps();

            $table->foreign('cinema_hall_id')
                ->references('id')
                ->on('cinema_halls')
                ->cascadeOnDelete();
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema_hall_movie');
    }
}
