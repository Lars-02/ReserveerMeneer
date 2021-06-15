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
     * @return bool|void
     */
    public function before(User $user)
    {
        if ($user->abilities()->contains('*.*'))
            return true;
        return;
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
     * @return bool
     */
    public function view(?User $user, Cinema $cinema): bool
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
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Cinema $cinema
     * @return false
     */
    public function update(User $user, Cinema $cinema): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Cinema $cinema
     * @return false
     */
    public function delete(User $user, Cinema $cinema): bool
    {
        return false;
    }
}
