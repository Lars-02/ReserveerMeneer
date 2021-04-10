<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaHall extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cinema() {
        return $this->belongsTo(Cinema::class);
    }

    public function cinemaHallRows() {
        return $this->hasMany(CinemaHallRow::class);
    }

    public function movieSlots() {
        return $this->hasMany(MovieSlot::class);
    }

    public function totalSeats() {
        return $this->cinemaHallRows()->sum('number_of_seats');
    }

    public function totalRows()
    {
        return $this->cinemaHallRows()->count();
    }
}
