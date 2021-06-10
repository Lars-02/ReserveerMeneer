<?php

namespace App\Models;

use Database\Factories\MovieFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Movie
 *
 * @property int $id
 * @property string $name
 * @property string $duration
 * @property int $minimum_age
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|MovieSlot[] $movieSlots
 * @property-read int|null $movie_slots_count
 * @method static MovieFactory factory(...$parameters)
 * @method static Builder|Movie newModelQuery()
 * @method static Builder|Movie newQuery()
 * @method static Builder|Movie query()
 * @method static Builder|Movie whereCreatedAt($value)
 * @method static Builder|Movie whereDuration($value)
 * @method static Builder|Movie whereId($value)
 * @method static Builder|Movie whereMinimumAge($value)
 * @method static Builder|Movie whereName($value)
 * @method static Builder|Movie whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Movie extends Model
{
    use HasFactory;

    public function movieSlots() {
        return $this->hasMany(MovieSlot::class);
    }
}
