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
 * @property int $row
 * @property-read CinemaHall $cinemaHall
 * @method static CinemaHallRowFactory factory(...$parameters)
 * @method static Builder|CinemaHallRow newModelQuery()
 * @method static Builder|CinemaHallRow newQuery()
 * @method static Builder|CinemaHallRow query()
 * @method static Builder|CinemaHallRow whereCinemaHallId($value)
 * @method static Builder|CinemaHallRow whereId($value)
 * @method static Builder|CinemaHallRow whereNumberOfSeats($value)
 * @mixin Eloquent
 * @property-read \App\Models\MovieSlot|null $movieSlot
 * @method static Builder|CinemaHallRow whereRow($value)
 */
class CinemaHallRow extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cinemaHall() {
        return $this->belongsTo(CinemaHall::class);
    }

    public function movieSlot() {
        return $this->hasOneThrough(MovieSlot::class, CinemaHall::class);
    }

    /**
     * @param MovieSlot $movieSlot
     * @param int $row
     * @return false|int|mixed
     */
    public function emptySeat(MovieSlot $movieSlot) {
        $takenSeat = MovieTicket::where('movie_slot_id', $movieSlot->id)->where('row', $this->row)->max('column');
        $emptyColumn = $takenSeat + rand(1, 6);
        if ($emptyColumn < $this->number_of_seats)
            return $emptyColumn;
        return false;
    }

    public function isEmptySeat(MovieSlot $movieSlot, int $column) {
        $rowMovieTickets = MovieTicket::where('movie_slot_id', $movieSlot->id)->where('row', $this->row)->pluck('column');
        $rowMovieTickets = $rowMovieTickets->map(function ($item) {
            return [$item + 2, $item +1, $item, $item - 1, $item -2];
        })->flatten()->unique();
        return $rowMovieTickets->every(function ($value) use ($column) {
            return $value != $column;
        });
    }
}
