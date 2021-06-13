<?php

namespace Database\Seeders;

use App\Models\CinemaHall;
use App\Models\Movie;
use App\Models\MovieSlot;
use Illuminate\Database\Seeder;

class MovieSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movie::all();

        CinemaHall::all()->each(function ($cinemaHall) use ($movies) {
            $movies->random(rand(3, 10))->each(function ($movie) use ($cinemaHall) {
                MovieSlot::factory()->create([
                        'cinema_hall_id' => $cinemaHall,
                        'movie_id' => $movie,
                    ]);
            });
        });
    }
}
