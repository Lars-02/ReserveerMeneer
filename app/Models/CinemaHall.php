<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CinemaHall
 *
 * @property int $id
 * @property int $cinema_id
 * @property-read \App\Models\Cinema $cinema
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CinemaHallRow[] $cinemaHallRows
 * @property-read int|null $cinema_hall_rows_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\MovieSlot[] $movieSlots
 * @property-read int|null $movie_slots_count
 * @method static \Database\Factories\CinemaHallFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall query()
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereCinemaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CinemaHall whereId($value)
 * @mixin \Eloquent
 */
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
