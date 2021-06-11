<?php

namespace App\Policies;

use App\Models\Cinema;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CinemaPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @return bool
     */
    public function before(User $user): bool
    {
        if ($user->abilities()->contains('*.*') || $user->abilities()->contains('cinema.*'))
            return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User|null $user
     * @return bool
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Cinema $cinema
     * @return void
     */
    public function view(?User $user, Cinema $cinema)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return void
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Cinema $cinema
     * @return void
     */
    public function update(User $user, Cinema $cinema)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Cinema $cinema
     * @return void
     */
    public function delete(User $user, Cinema $cinema)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Cinema $cinema
     * @return void
     */
    public function restore(User $user, Cinema $cinema)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Cinema $cinema
     * @return void
     */
    public function forceDelete(User $user, Cinema $cinema)
    {
        //
    }
}
