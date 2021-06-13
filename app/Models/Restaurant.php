<?php

namespace App\Models;

use Database\Factories\RestaurantFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Restaurant
 *
 * @property int $id
 * @property string $name
 * @property int $seats
 * @property int $max_slot_reservations
 * @property int $restaurant_type_id
 * @property string $city
 * @property string $streetname
 * @property string $house_number
 * @property string $country_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static RestaurantFactory factory(...$parameters)
 * @method static Builder|Restaurant newModelQuery()
 * @method static Builder|Restaurant newQuery()
 * @method static Builder|Restaurant query()
 * @method static Builder|Restaurant whereCity($value)
 * @method static Builder|Restaurant whereCountryCode($value)
 * @method static Builder|Restaurant whereCreatedAt($value)
 * @method static Builder|Restaurant whereHouseNumber($value)
 * @method static Builder|Restaurant whereId($value)
 * @method static Builder|Restaurant whereMaxSlotReservations($value)
 * @method static Builder|Restaurant whereName($value)
 * @method static Builder|Restaurant whereRestaurantTypeId($value)
 * @method static Builder|Restaurant whereSeats($value)
 * @method static Builder|Restaurant whereStreetname($value)
 * @method static Builder|Restaurant whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Restaurant extends Model
{
    use HasFactory;

    public function restaurantType() : BelongsTo
    {
        return $this->belongsTo(RestaurantType::class);
    }

    public function openingHours() {
        return $this->hasMany(OpeningHours::class);
    }
}
