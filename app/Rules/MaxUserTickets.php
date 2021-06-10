<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MaxUserTickets implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value['user']->eventTickets->where('event_id', $value['event']->id)->count() < $value['event']->max_user_tickets;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.max_tickets');
    }
}
