<?php

namespace App\Policies;

use App\Models\CinemaHall;
use App\Models\Movie;
use App\Models\MovieSlot;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MovieSlotPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return void
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @param Movie $movie
     * @return void
     */
    public function view(User $user, CinemaHall $cinemaHall, Movie $movie)
    {
        //
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
     * @param CinemaHall $cinemaHall
     * @param Movie $movie
     * @return void
     */
    public function update(User $user, CinemaHall $cinemaHall, Movie $movie)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @param Movie $movie
     * @return void
     */
    public function delete(User $user, CinemaHall $cinemaHall, Movie $movie)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @param Movie $movie
     * @return void
     */
    public function restore(User $user, CinemaHall $cinemaHall, Movie $movie)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param CinemaHall $cinemaHall
     * @param Movie $movie
     * @return void
     */
    public function forceDelete(User $user, CinemaHall $cinemaHall, Movie $movie)
    {
        //
    }
}
