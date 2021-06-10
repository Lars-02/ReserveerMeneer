<?php

namespace App\Models;

use Database\Factories\EventTicketFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Carbon;

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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static EventTicketFactory factory(...$parameters)
 * @method static Builder|EventTicket newModelQuery()
 * @method static Builder|EventTicket newQuery()
 * @method static Builder|EventTicket query()
 * @method static Builder|EventTicket whereBirthday($value)
 * @method static Builder|EventTicket whereCreatedAt($value)
 * @method static Builder|EventTicket whereEndAt($value)
 * @method static Builder|EventTicket whereEventId($value)
 * @method static Builder|EventTicket whereFirstname($value)
 * @method static Builder|EventTicket whereId($value)
 * @method static Builder|EventTicket whereLastname($value)
 * @method static Builder|EventTicket wherePhotoPath($value)
 * @method static Builder|EventTicket whereStartAt($value)
 * @method static Builder|EventTicket whereUpdatedAt($value)
 * @method static Builder|EventTicket whereUserId($value)
 * @mixin Eloquent
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
