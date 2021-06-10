<?php

namespace App\Models;

use Database\Factories\RestaurantTypeFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RestaurantType
 *
 * @property int $id
 * @property string $type
 * @method static RestaurantTypeFactory factory(...$parameters)
 * @method static Builder|RestaurantType newModelQuery()
 * @method static Builder|RestaurantType newQuery()
 * @method static Builder|RestaurantType query()
 * @method static Builder|RestaurantType whereId($value)
 * @method static Builder|RestaurantType whereType($value)
 * @mixin Eloquent
 */
class RestaurantType extends Model
{
    use HasFactory;
    public $timestamps = false;
}
