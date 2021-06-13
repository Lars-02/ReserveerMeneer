<?php

namespace App\Models;

use App\Http\Encryptable;
use Database\Factories\EventFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read mixed $remaining_tickets
 * @property-read Collection|EventTicket[] $tickets
 * @property-read int|null $tickets_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static EventFactory factory(...$parameters)
 * @method static Builder|Event newModelQuery()
 * @method static Builder|Event newQuery()
 * @method static Builder|Event query()
 * @method static Builder|Event whereCity($value)
 * @method static Builder|Event whereCountryCode($value)
 * @method static Builder|Event whereCreatedAt($value)
 * @method static Builder|Event whereEndDate($value)
 * @method static Builder|Event whereHouseNumber($value)
 * @method static Builder|Event whereId($value)
 * @method static Builder|Event whereMaxUserTickets($value)
 * @method static Builder|Event whereName($value)
 * @method static Builder|Event whereStartDate($value)
 * @method static Builder|Event whereStreetname($value)
 * @method static Builder|Event whereTotalTickets($value)
 * @method static Builder|Event whereUpdatedAt($value)
 * @mixin Eloquent
 */

class Event extends Model
{
    use HasFactory, Encryptable;

    protected $encryptable = [
        'name',
        'city',
        'streetname',
        'house_number',
        'country_code',
        'total_tickets',
        'max_user_tickets',
    ];

    protected $guarded = [];

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
