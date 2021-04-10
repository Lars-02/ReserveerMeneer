<?php

namespace Database\Factories;

use App\Models\MovieSlot;
use App\Models\MovieTicket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieTicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MovieTicket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'movie_slot_id' => MovieSlot::factory(),
            'user_id' => User::factory(),
            'row' => $this->faker->numberBetween(0 ,10),
            'column' => $this->faker->numberBetween(0 ,5),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'birthday' => $this->faker->date(),
        ];
    }

    public function minimumAge($minimumAge)
    {
        return $this->state(function ($attributes) use ($minimumAge) {
            return [
                'birthday' => date_format($this->faker->dateTimeBetween('-60 years', '-'.$minimumAge.' years'), 'Y-m-d'),
            ];
        });
    }
}
