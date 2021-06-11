<?php

namespace App\Policies;

use App\Models\MovieTicket;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MovieTicketPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @return bool
     */
    public function before(User $user)
    {
        if ($user->abilities()->contains('*.*'))
            return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MovieTicket  $movieTicket
     * @return mixed
     */
    public function view(User $user, MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MovieTicket  $movieTicket
     * @return mixed
     */
    public function update(User $user, MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MovieTicket  $movieTicket
     * @return mixed
     */
    public function delete(User $user, MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MovieTicket  $movieTicket
     * @return mixed
     */
    public function restore(User $user, MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MovieTicket  $movieTicket
     * @return mixed
     */
    public function forceDelete(User $user, MovieTicket $movieTicket)
    {
        //
    }
}
