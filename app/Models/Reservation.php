<?php

namespace App\Models;

use Database\Factories\ReservationFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Reservation
 *
 * @property int $id
 * @property int $restaurant_id
 * @property int $user_id
 * @property string $time_slot
 * @property int $number_of_guests
 * @property int $queued
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ReservationFactory factory(...$parameters)
 * @method static Builder|Reservation newModelQuery()
 * @method static Builder|Reservation newQuery()
 * @method static Builder|Reservation query()
 * @method static Builder|Reservation whereCreatedAt($value)
 * @method static Builder|Reservation whereId($value)
 * @method static Builder|Reservation whereNumberOfGuests($value)
 * @method static Builder|Reservation whereQueued($value)
 * @method static Builder|Reservation whereRestaurantId($value)
 * @method static Builder|Reservation whereTimeSlot($value)
 * @method static Builder|Reservation whereUpdatedAt($value)
 * @method static Builder|Reservation whereUserId($value)
 * @mixin Eloquent
 * @property string $time
 * @property-read \App\Models\Restaurant $restaurant
 * @property-read \App\Models\User $user
 * @method static Builder|Reservation whereTime($value)
 */
class Reservation extends Model
{
    use HasFactory;

    public function restaurant() {
        return $this->belongsTo(Restaurant::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
