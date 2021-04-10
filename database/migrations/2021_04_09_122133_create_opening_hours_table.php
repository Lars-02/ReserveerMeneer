<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeningHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opening_hours', function (Blueprint $table) {
            $table->id();
            $table->unique(['restaurant_id', 'day']);
            $table->unsignedBigInteger('restaurant_id');
            $table->integer('day');
            $table->time('opening_at');
            $table->time('closing_at');
            $table->timestamps();

            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants')
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
        Schema::dropIfExists('opening_hours');
    }
}
