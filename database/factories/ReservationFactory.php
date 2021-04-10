<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => Restaurant::all()->random(),
            'user_id' => User::all()->random(),
            'time_slot' => $this->faker->time('H:i'),
            'number_of_guests' => $this->faker->numberBetween(1, 8),
            'queued' => $this->faker->boolean(20),
        ];
    }
}
