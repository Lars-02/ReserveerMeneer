<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class, 'event_tickets')->using(EventTicket::class);
    }
}
