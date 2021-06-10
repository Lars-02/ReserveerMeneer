<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $city
 * @property string $streetname
 * @property string $house_number
 * @property string $country_code
 * @property int $total_tickets
 * @property int $max_user_tickets
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $remaining_tickets
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventTicket[] $tickets
 * @property-read int|null $tickets_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\EventFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereHouseNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereMaxUserTickets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStreetname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTotalTickets($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsToMany(User::class, 'event_tickets')->using(EventTicket::class);
    }

    public function tickets() {
        return $this->hasMany(EventTicket::class);
    }

    public function getRemainingTicketsAttribute()
    {
        return $this->total_tickets - $this->tickets->count();
    }
}
