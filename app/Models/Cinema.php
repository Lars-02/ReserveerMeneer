<?php

namespace App\Models;

use Database\Factories\CinemaFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Cinema
 *
 * @property int $id
 * @property string $name
 * @property string $city
 * @property string $streetname
 * @property string $house_number
 * @property string $country_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|CinemaHall[] $cinemaHalls
 * @property-read int|null $cinema_halls_count
 * @method static CinemaFactory factory(...$parameters)
 * @method static Builder|Cinema newModelQuery()
 * @method static Builder|Cinema newQuery()
 * @method static Builder|Cinema query()
 * @method static Builder|Cinema whereCity($value)
 * @method static Builder|Cinema whereCountryCode($value)
 * @method static Builder|Cinema whereCreatedAt($value)
 * @method static Builder|Cinema whereHouseNumber($value)
 * @method static Builder|Cinema whereId($value)
 * @method static Builder|Cinema whereName($value)
 * @method static Builder|Cinema whereStreetname($value)
 * @method static Builder|Cinema whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|\App\Models\MovieSlot[] $movieSlots
 * @property-read int|null $movie_slots_count
 */
class Cinema extends Model
{
    use HasFactory;

    public function cinemaHalls() {
        return $this->hasMany(CinemaHall::class);
    }

    public function movieSlots()
    {
        return $this->hasManyThrough(MovieSlot::class, CinemaHall::class);
    }
}
