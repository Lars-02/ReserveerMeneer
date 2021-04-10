<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->catchPhrase,
            'duration' => date('H:i:s', rand(3600, 10800)),
            'minimum_age' => $this->faker->randomElement([0, 3, 6, 9, 12, 16, 18]),
        ];
    }
}
