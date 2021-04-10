<?php

namespace Database\Seeders;

use App\Models\CinemaHall;
use App\Models\CinemaHallRow;
use Illuminate\Database\Seeder;

class CinemaHallRowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CinemaHall::all()->each(function ($cinemaHall) {
            $cinemaHall->cinemaHallRows()->saveMany(CinemaHallRow::factory()->count(rand(6, 20))->create([
                'cinema_hall_id' => $cinemaHall->id,
            ]));
        });
    }
}
