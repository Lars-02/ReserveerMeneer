<?php

namespace Database\Factories;

use App\Models\OpeningHours;
use App\Models\Restaurant;
use DateTime;
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
            'opening_at' => $this->roundToNearestInterval($this->faker->dateTime()),
            'closing_at' => $this->roundToNearestInterval($this->faker->dateTime()),
        ];
    }

    /**
     * Round minutes to the nearest interval of a DateTime object.
     *
     * @param DateTime $dateTime
     * @return string
     */
    private function roundToNearestInterval(DateTime $dateTime): string
    {
        return $dateTime->setTime(
            $dateTime->format('H'),
            rand(0, 1) == 1 ? 30 : 0
        )->format('H:i');
    }
}
