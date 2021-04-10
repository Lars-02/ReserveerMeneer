<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaHallRowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema_hall_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cinema_hall_id');
            $table->integer('number_of_seats');

            $table->foreign('cinema_hall_id')
                ->references('id')
                ->on('cinema_halls')
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
        Schema::dropIfExists('cinema_hall_rows');
    }
}
