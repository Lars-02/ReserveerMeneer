<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventTicket;
use App\Models\User;
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
            'start' => $this->faker->date(),
            'end' => $this->faker->date(),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'birthday' => $this->faker->date(),
            'photo_path' => $this->faker->imageUrl(),
        ];
    }
}
