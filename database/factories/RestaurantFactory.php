<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\RestaurantType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (RestaurantType::all()->isEmpty())
            RestaurantType::factory()->create();
        return [
            'name' => $this->faker->company,
            'seats' => $this->faker->numberBetween(40, 250),
            'restaurant_type_id' => RestaurantType::all()->random(),
            'streetname' => $this->faker->streetName,
            'house_number' => $this->faker->numberBetween(1, 300),
            'city' => $this->faker->city,
            'country_code' => $this->faker->countryCode,
        ];
    }
}
