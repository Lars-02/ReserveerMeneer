<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Models\EventTicket
 *
 * @property int $id
 * @property int $event_id
 * @property int $user_id
 * @property string $start_at
 * @property string $end_at
 * @property string $firstname
 * @property string $lastname
 * @property string $birthday
 * @property string $photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EventTicketFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket wherePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTicket whereUserId($value)
 * @mixin \Eloquent
 */
class EventTicket extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'event_tickets';
}
