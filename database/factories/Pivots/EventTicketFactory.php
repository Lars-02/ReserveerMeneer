<?php

namespace Database\Factories\Pivots;

use App\Models\Event;
use App\Models\User;
use App\Pivots\EventTicket;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventTicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EventTicket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'event_id' => Event::factory(),
            'user_id' => User::factory(),
            'startingDay' => $this->faker->numberBetween(0, 3),
            'duration' => $this->faker->numberBetween(1, 3),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'birthday' => $this->faker->date(),
            'photoPath' => $this->faker->imageUrl(),
        ];
    }
}
