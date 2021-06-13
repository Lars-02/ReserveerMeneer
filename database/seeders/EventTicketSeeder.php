<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventTicket;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::all();

        User::all()->each(function ($user) use ($events) {
            $events->random(rand(1, 4))->each(function ($event) use ($user) {
                EventTicket::factory()->count(min(rand(1, $event->max_user_tickets), $event->remainingTickets))->create([
                        'event_id' => $event,
                        'user_id' => $user,
                    ]
                );
            });
        });
    }
}
