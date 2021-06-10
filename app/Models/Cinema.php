<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cinema
 *
 * @property int $id
 * @property string $name
 * @property string $city
 * @property string $streetname
 * @property string $house_number
 * @property string $country_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CinemaHall[] $cinemaHalls
 * @property-read int|null $cinema_halls_count
 * @method static \Database\Factories\CinemaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereHouseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereStreetname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cinema whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cinema extends Model
{
    use HasFactory;

    public function cinemaHalls() {
        return $this->hasMany(CinemaHall::class);
    }
}
