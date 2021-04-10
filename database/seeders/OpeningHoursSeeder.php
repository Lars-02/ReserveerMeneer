<?php

namespace Database\Seeders;

use App\Models\OpeningHours;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class OpeningHoursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::all()->each(function ($restaurant) {
           for ($day = rand(0, 1); $day < rand(6, 7); $day++) {
               OpeningHours::factory()
                   ->create([
                       'restaurant_id' => $restaurant,
                       'day' => $day,
                   ]);
           }
        });
    }
}
