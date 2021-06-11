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
            for ($i = rand(6, 20); $i > 0; $i--) {
                $cinemaHall->cinemaHallRows()->save(CinemaHallRow::factory()->create([
                    'cinema_hall_id' => $cinemaHall->id,
                    'row' => $i,
                ]));
            }

        });
    }
}
