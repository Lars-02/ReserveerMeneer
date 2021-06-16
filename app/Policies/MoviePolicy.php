<?php

namespace App\Policies;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
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
     * @param User $user
     * @return mixed
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function view(?User $user, Movie $movie)
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
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function update(User $user, Movie $movie)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Movie $movie
     * @return mixed
     */
    public function delete(User $user, Movie $movie)
    {
        return false;
    }
}

