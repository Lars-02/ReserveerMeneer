<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MovieTicketFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereMovieSlotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereRow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTicket whereUserId($value)
 * @mixin \Eloquent
 */
class MovieTicket extends Model
{
    use HasFactory;
}
