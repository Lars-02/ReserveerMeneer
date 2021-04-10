<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MovieSlot extends Pivot
{
    use hasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public function cinemaHall() {
        return $this->belongsTo(CinemaHall::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
