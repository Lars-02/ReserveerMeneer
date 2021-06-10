<?php

namespace App\Models;

use Database\Factories\MovieSlotFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

/**
 * App\Models\MovieSlot
 *
 * @property int $id
 * @property int $cinema_hall_id
 * @property int $movie_id
 * @property string $starting_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read CinemaHall $cinemaHall
 * @property-read Movie $movie
 * @method static MovieSlotFactory factory(...$parameters)
 * @method static Builder|MovieSlot newModelQuery()
 * @method static Builder|MovieSlot newQuery()
 * @method static Builder|MovieSlot query()
 * @method static Builder|MovieSlot whereCinemaHallId($value)
 * @method static Builder|MovieSlot whereCreatedAt($value)
 * @method static Builder|MovieSlot whereId($value)
 * @method static Builder|MovieSlot whereMovieId($value)
 * @method static Builder|MovieSlot whereStartingAt($value)
 * @method static Builder|MovieSlot whereUpdatedAt($value)
 * @mixin Eloquent
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
