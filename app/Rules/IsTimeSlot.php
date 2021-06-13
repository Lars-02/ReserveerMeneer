<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class IsTimeSlot implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return date('i', strtotime($value)) % 30 === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('reservation.wrong.time.slot');
    }
}
