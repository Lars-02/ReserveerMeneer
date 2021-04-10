<?php

namespace Database\Factories;

use App\Models\OpeningHours;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class OpeningHoursFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OpeningHours::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::factory(),
            'day' => $this->faker->numberBetween(0 ,6),
            'opening_at' => $this->faker->time('H:i'),
            'closing_at' => $this->faker->time('H:i'),
        ];
    }
}
