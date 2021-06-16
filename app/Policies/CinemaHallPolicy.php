<?php

namespace App\Policies;

use App\Models\CinemaHall;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CinemaHallPolicy
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
     * Determine whether the user can view the model.
     *
     * @param User|null $user
     * @param CinemaHall $cinemaHall
     * @return bool
     */
    public function view(?User $user, CinemaHall $cinemaHall): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return false
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @return false
     */
    public function delete(User $user, CinemaHall $cinemaHall): bool
    {
        return false;
    }
}
