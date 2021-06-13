<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\User;
use DateTime;
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
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::all()->random(),
            'user_id' => User::all()->random(),
            'time' => $this->roundToNearestInterval($this->faker->dateTimeBetween('-2 days', '+1 day')),
            'number_of_guests' => $this->faker->numberBetween(1, 12),
            'queued' => $this->faker->boolean(20),
        ];
    }

    /**
     * Round minutes to the nearest interval of a DateTime object.
     *
     * @param DateTime $dateTime
     * @return DateTime
     */
    private function roundToNearestInterval(DateTime $dateTime): DateTime
    {
        return $dateTime->setTime(
            $dateTime->format('H'),
            round($dateTime->format('i') / 30) * 30,
            0
        );
    }
}
