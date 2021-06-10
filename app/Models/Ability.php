<?php

namespace App\Models;

use Database\Factories\AbilityFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Ability
 *
 * @property int $id
 * @property string $name
 * @property string|null $label
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static AbilityFactory factory(...$parameters)
 * @method static Builder|Ability newModelQuery()
 * @method static Builder|Ability newQuery()
 * @method static Builder|Ability query()
 * @method static Builder|Ability whereCreatedAt($value)
 * @method static Builder|Ability whereId($value)
 * @method static Builder|Ability whereLabel($value)
 * @method static Builder|Ability whereName($value)
 * @method static Builder|Ability whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Ability extends Model
{
    use HasFactory;
}
