<?php

namespace App\Policies;

use App\Models\CinemaHallRow;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CinemaHallRowPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @return bool|void
     */
    public function before(User $user)
    {
        if ($user->abilities()->contains('*.*'))
            return true;
        return;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CinemaHallRow  $cinemaHallRow
     * @return mixed
     */
    public function delete(User $user, CinemaHallRow $cinemaHallRow)
    {
        //
    }
}
