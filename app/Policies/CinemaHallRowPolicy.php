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
     * @param User $user
     * @return false
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param CinemaHallRow $cinemaHallRow
     * @return false
     */
    public function delete(User $user, CinemaHallRow $cinemaHallRow)
    {
        return false;
    }
}
