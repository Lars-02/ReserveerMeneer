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
    public function viewAny(User $user)
    {
        if (empty(request()->route('user')))
            return true;
        return $user->id === request()->route('user')->id;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param MovieTicket $movieTicket
     * @return mixed
     */
    public function view(User $user, MovieTicket $movieTicket)
    {
        return $user->id === $movieTicket->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param MovieTicket $movieTicket
     * @return mixed
     */
    public function update(User $user, MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param MovieTicket $movieTicket
     * @return mixed
     */
    public function delete(User $user, MovieTicket $movieTicket)
    {
        return $user->id === $movieTicket->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param MovieTicket $movieTicket
     * @return mixed
     */
    public function restore(User $user, MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param MovieTicket $movieTicket
     * @return mixed
     */
    public function forceDelete(User $user, MovieTicket $movieTicket)
    {
        //
    }
}
