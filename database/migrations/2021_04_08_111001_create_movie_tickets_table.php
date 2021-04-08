<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_slot_id');
            $table->unsignedBigInteger('user_id');

            $table->integer('row');
            $table->integer('column');

            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthday');

            $table->timestamps();

            $table->foreign('movie_slot_id')
                ->references('id')
                ->on('movie_slot')
                ->cascadeOnDelete();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('movie_tickets');
    }
}
