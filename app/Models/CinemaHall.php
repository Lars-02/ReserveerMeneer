<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaHall extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cinema() {
        return $this->belongsTp(Cinema::class);
    }

    public function cinemaHallRows() {
        return $this->hasMany(CinemaHallRow::class);
    }
}
