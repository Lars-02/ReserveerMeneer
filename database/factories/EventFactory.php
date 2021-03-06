<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'start' => $this->faker->dateTimeBetween('-1 weeks'),
            'end' => $this->faker->dateTimeBetween('now', '+1 weeks'),
            'streetname' => $this->faker->streetName,
            'house_number' => $this->faker->numberBetween(1, 300),
            'city' => $this->faker->city,
            'country_code' => $this->faker->countryCode,
            'total_tickets' => $this->faker->numberBetween(200, 800),
            'max_user_tickets' => $this->faker->numberBetween(2, 8),
        ];
    }
}
