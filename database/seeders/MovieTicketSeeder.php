<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventTicket;
use App\Models\MovieSlot;
use App\Models\MovieTicket;
use App\Models\User;
use Illuminate\Database\Seeder;
use function PHPUnit\Framework\isEmpty;

class MovieTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movieSlots = MovieSlot::all();
        $users = User::all();

        $users->each(function ($user) use ($movieSlots, $users) {
            $movieSlots->random(rand(1, 3))->each(function ($movieSlot) use ($user, $users) {
                $row =  rand(0, $movieSlot->cinemaHall->totalRows() - 1);
                MovieTicket::factory()->count(rand(1, floor($movieSlot->cinemaHall->totalSeats() / $users->count())))->create([
                        'movie_slot_id' => $movieSlot,
                        'user_id' => $user,
                        'row' => $row,
                        'column' => rand(0, $movieSlot->cinemaHall->cinemaHallRows->offsetGet($row)->number_of_seats - 1),
                    ]
                );
            });
        });
    }
}
