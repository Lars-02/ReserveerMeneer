<?php

namespace App\Models;

use Database\Factories\CinemaHallRowFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CinemaHallRow
 *
 * @property int $id
 * @property int $cinema_hall_id
 * @property int $number_of_seats
 * @property-read CinemaHall $cinemaHall
 * @method static CinemaHallRowFactory factory(...$parameters)
 * @method static Builder|CinemaHallRow newModelQuery()
 * @method static Builder|CinemaHallRow newQuery()
 * @method static Builder|CinemaHallRow query()
 * @method static Builder|CinemaHallRow whereCinemaHallId($value)
 * @method static Builder|CinemaHallRow whereId($value)
 * @method static Builder|CinemaHallRow whereNumberOfSeats($value)
 * @mixin Eloquent
 */
class CinemaHallRow extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cinemaHall() {
        return $this->belongsTo(CinemaHall::class);
    }
}
