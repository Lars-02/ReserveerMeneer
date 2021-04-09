<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('seats');
            $table->integer('max_slot_reservations')->default(10);
            $table->unsignedBigInteger('restaurant_type_id');

            $table->string('city');
            $table->string('streetname');
            $table->string('house_number');
            $table->string('country_code');
            $table->timestamps();

            $table->foreign('restaurant_type_id')
                ->references('id')
                ->on('restaurant_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
