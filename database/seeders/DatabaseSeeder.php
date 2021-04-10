<?php

namespace Database\Seeders;

use App\Models\CinemaHall;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            UserRoleSeeder::class,
            EventSeeder::class,
            EventTicketSeeder::class,
            MovieSeeder::class,
            CinemaSeeder::class,
            CinemaHallSeeder::class,
            CinemaHallRowSeeder::class,
        ]);
    }
}
