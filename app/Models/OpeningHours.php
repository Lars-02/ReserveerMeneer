<?php

namespace App\Models;

use Database\Factories\OpeningHoursFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\OpeningHours
 *
 * @property int $id
 * @property int $restaurant_id
 * @property int $day
 * @property string $opening_at
 * @property string $closing_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static OpeningHoursFactory factory(...$parameters)
 * @method static Builder|OpeningHours newModelQuery()
 * @method static Builder|OpeningHours newQuery()
 * @method static Builder|OpeningHours query()
 * @method static Builder|OpeningHours whereClosingAt($value)
 * @method static Builder|OpeningHours whereCreatedAt($value)
 * @method static Builder|OpeningHours whereDay($value)
 * @method static Builder|OpeningHours whereId($value)
 * @method static Builder|OpeningHours whereOpeningAt($value)
 * @method static Builder|OpeningHours whereRestaurantId($value)
 * @method static Builder|OpeningHours whereUpdatedAt($value)
 * @mixin Eloquent
 */
class OpeningHours extends Model
{
    use HasFactory;
}
