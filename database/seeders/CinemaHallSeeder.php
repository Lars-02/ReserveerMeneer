<?php

namespace Database\Seeders;

use App\Models\Cinema;
use App\Models\CinemaHall;
use Illuminate\Database\Seeder;

class CinemaHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cinema::all()->each(function ($cinema) {
            $cinema->cinemaHalls()->saveMany(CinemaHall::factory()->count(rand(3, 6))->create([
                'cinema_id' => $cinema,
            ]));
        });
    }
}
