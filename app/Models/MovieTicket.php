<?php

namespace App\Models;

use Database\Factories\MovieTicketFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\MovieTicket
 *
 * @property int $id
 * @property int $movie_slot_id
 * @property int $user_id
 * @property int $row
 * @property int $column
 * @property string $firstname
 * @property string $lastname
 * @property string $birthday
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static MovieTicketFactory factory(...$parameters)
 * @method static Builder|MovieTicket newModelQuery()
 * @method static Builder|MovieTicket newQuery()
 * @method static Builder|MovieTicket query()
 * @method static Builder|MovieTicket whereBirthday($value)
 * @method static Builder|MovieTicket whereColumn($value)
 * @method static Builder|MovieTicket whereCreatedAt($value)
 * @method static Builder|MovieTicket whereFirstname($value)
 * @method static Builder|MovieTicket whereId($value)
 * @method static Builder|MovieTicket whereLastname($value)
 * @method static Builder|MovieTicket whereMovieSlotId($value)
 * @method static Builder|MovieTicket whereRow($value)
 * @method static Builder|MovieTicket whereUpdatedAt($value)
 * @method static Builder|MovieTicket whereUserId($value)
 * @mixin Eloquent
 */
class MovieTicket extends Model
{
    use HasFactory;
}
