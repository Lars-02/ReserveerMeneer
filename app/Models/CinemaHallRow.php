<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaHallRow extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cinemaHall() {
        return $this->belongsTo(CinemaHall::class);
    }
}
