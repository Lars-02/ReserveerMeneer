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
            $events->random(rand(0, 3))->each(function ($event) use ($user) {
                EventTicket::factory()->count(rand(1, $event->max_user_tickets))->create([
                        'event_id' => $event,
                        'user_id' => $user->id,
                    ]
                );
            });
        });
    }
}
