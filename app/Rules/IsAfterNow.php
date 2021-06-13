<?php

namespace App\Rules;

use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Date;

class IsAfterNow implements Rule
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
     * @throws Exception
     */
    public function passes($attribute, $value)
    {
        return date("Y-m-d H:i:s", strtotime($value)) > date(Date::now());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     * @throws Exception
     */
    public function message()
    {
        return __('validation.after', ['date' => date(Date::now())]);
    }
}
