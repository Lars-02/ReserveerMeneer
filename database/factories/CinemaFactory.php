<?php

namespace Database\Factories;

use App\Models\Cinema;
use Illuminate\Database\Eloquent\Factories\Factory;

class CinemaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cinema::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'streetname' => $this->faker->streetName,
            'house_number' => $this->faker->numberBetween(1, 300),
            'city' => $this->faker->city,
            'country_code' => $this->faker->countryCode,
        ];
    }
}
