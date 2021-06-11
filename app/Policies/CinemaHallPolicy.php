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
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @return mixed
     */
    public function view(?User $user, CinemaHall $cinemaHall)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @return mixed
     */
    public function update(User $user, CinemaHall $cinemaHall)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @return mixed
     */
    public function delete(User $user, CinemaHall $cinemaHall)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @return mixed
     */
    public function restore(User $user, CinemaHall $cinemaHall)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @return mixed
     */
    public function forceDelete(User $user, CinemaHall $cinemaHall)
    {
        //
    }
}
