<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OpeningHours
 *
 * @property int $id
 * @property int $restaurant_id
 * @property int $day
 * @property string $opening_at
 * @property string $closing_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\OpeningHoursFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours query()
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours whereClosingAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours whereOpeningAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OpeningHours whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OpeningHours extends Model
{
    use HasFactory;
}
