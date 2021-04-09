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
            'startDate' => $this->faker->dateTimeBetween('-1 weeks'),
            'endDate' => $this->faker->dateTimeBetween('now', '+1 weeks'),
            'streetname' => $this->faker->streetName,
            'house_number' => $this->faker->numberBetween(1, 300),
            'city' => $this->faker->city,
            'country_code' => $this->faker->countryCode,
            'totalTickets' => $this->faker->numberBetween(100, 10000),
            'maxTicketsPerUser' => $this->faker->numberBetween(2, 8),
        ];
    }
}
