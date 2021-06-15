<?php

namespace Database\Factories;

use App\Models\CinemaHall;
use App\Models\Movie;
use App\Models\MovieSlot;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieSlotFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieSlot::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cinema_hall_id' => CinemaHall::factory(),
            'movie_id' => Movie::factory(),
            'start' => $this->faker->unique()->dateTimeBetween('-1 weeks', '+1 weeks'),
        ];
    }
}
