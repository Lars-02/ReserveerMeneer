<?php

namespace Database\Seeders;

use App\Models\RestaurantType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurantTypes = new Collection(['Chinese', 'Oriental', 'Sushi', 'Arabic', 'Dutch', 'Italian', 'Korean', 'German', 'English']);
        $restaurantTypes->each(function ($restaurantType) {
            RestaurantType::factory()->create([
                'type' => $restaurantType,
            ]);
        });
    }
}
