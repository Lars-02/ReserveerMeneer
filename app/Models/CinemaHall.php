<?php

namespace App\Models;

use Database\Factories\CinemaHallFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CinemaHall
 *
 * @property int $id
 * @property int $cinema_id
 * @property-read Cinema $cinema
 * @property-read Collection|CinemaHallRow[] $cinemaHallRows
 * @property-read int|null $cinema_hall_rows_count
 * @property-read Collection|MovieSlot[] $movieSlots
 * @property-read int|null $movie_slots_count
 * @method static CinemaHallFactory factory(...$parameters)
 * @method static Builder|CinemaHall newModelQuery()
 * @method static Builder|CinemaHall newQuery()
 * @method static Builder|CinemaHall query()
 * @method static Builder|CinemaHall whereCinemaId($value)
 * @method static Builder|CinemaHall whereId($value)
 * @mixin Eloquent
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

    public function cinemaHallRow(int $row) {
        return CinemaHallRow::where('row', $row);
    }
}
