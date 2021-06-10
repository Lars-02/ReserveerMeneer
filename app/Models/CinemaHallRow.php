<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CinemaHallRow
 *
 * @property int $id
 * @property int $cinema_hall_id
 * @property int $number_of_seats
 * @property-read \App\Models\CinemaHall $cinemaHall
 * @method static \Database\Factories\CinemaHallRowFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHallRow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHallRow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHallRow query()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHallRow whereCinemaHallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHallRow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHallRow whereNumberOfSeats($value)
 * @mixin \Eloquent
 */
class CinemaHallRow extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cinemaHall() {
        return $this->belongsTo(CinemaHall::class);
    }
}
