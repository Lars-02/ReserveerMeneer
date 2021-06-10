<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RestaurantType
 *
 * @property int $id
 * @property string $type
 * @method static \Database\Factories\RestaurantTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType query()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType whereType($value)
 * @mixin \Eloquent
 */
class RestaurantType extends Model
{
    use HasFactory;
    public $timestamps = false;
}
