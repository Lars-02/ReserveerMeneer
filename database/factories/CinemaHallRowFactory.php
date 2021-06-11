<?php

namespace Database\Factories;

use App\Models\CinemaHall;
use App\Models\CinemaHallRow;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class CinemaHallRowFactory extends Factory
{

    private static $row = 1;

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CinemaHallRow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cinema_hall_id' => CinemaHall::factory(),
            'row' => self::$row++,
            'number_of_seats' => $this->faker->numberBetween(10, 30),
        ];
    }
}
