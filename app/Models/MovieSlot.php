<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\MovieSlot
 *
 * @property int $id
 * @property int $cinema_hall_id
 * @property int $movie_id
 * @property string $starting_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CinemaHall $cinemaHall
 * @property-read \App\Models\Movie $movie
 * @method static \Database\Factories\MovieSlotFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot whereCinemaHallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot whereStartingAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieSlot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
