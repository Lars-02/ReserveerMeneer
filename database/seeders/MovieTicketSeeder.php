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
            $movieSlots->random(rand(1, 4))->each(function ($movieSlot) use ($user, $users) {
                for ($i = rand(1, $movieSlot->cinemaHall->totalRows()); $i > 0; $i--) {
                    $row = rand(1, $movieSlot->cinemaHall->totalRows());
                    for ($i = rand(1, min(6, $movieSlot->cinemaHall->cinemaHallRows->firstWhere('row', $row)->number_of_seats)); $i > 0; $i--) {
                        $seat = $movieSlot->cinemaHall->cinemaHallRows->firstWhere('row', $row)->emptySeat($movieSlot);
                        if (!$seat)
                            continue;
                        MovieTicket::factory()->create([
                                'movie_slot_id' => $movieSlot,
                                'user_id' => $user,
                                'row' => $row,
                                'column' => $seat,
                            ]
                        );
                    }
                }
            });
        });
    }
}
