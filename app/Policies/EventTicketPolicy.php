<?php

namespace App\Policies;

use App\Models\EventTicket;
use App\Models\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventTicketPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @return void|bool
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
     * @param EventTicket $eventTicket
     * @return mixed
     */
    public function view(User $user, EventTicket $eventTicket)
    {
        return $user->id === $eventTicket->user_id;
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
     * @param EventTicket $eventTicket
     * @return mixed
     */
    public function update(User $user, EventTicket $eventTicket)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param EventTicket $eventTicket
     * @return mixed
     */
    public function delete(User $user, EventTicket $eventTicket)
    {
        return $user->id === $eventTicket->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param EventTicket $eventTicket
     * @return mixed
     */
    public function restore(User $user, EventTicket $eventTicket)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param EventTicket $eventTicket
     * @return mixed
     */
    public function forceDelete(User $user, EventTicket $eventTicket)
    {
        //
    }

    public function download(User $user) {
        if (empty(request()->route('user')))
            return true;
        return $user->id === request()->route('user')->id;
    }
}
