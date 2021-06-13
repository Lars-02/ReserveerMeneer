<?php

namespace App\Http\Requests;

use App\Rules\IsAfterNow;
use App\Rules\IsTimeSlot;
use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{

    /**
     * Prepare the data for validation.
     *
     * @return void
     * @noinspection PhpUndefinedFieldInspection
     */
    protected function prepareForValidation()
    {
        $this->merge([
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'restaurant_id' => 'required',
            'user_id' => 'required',
            'time' => ['required', new IsTimeSlot(), new IsAfterNow,],
            'queued' => 'required',
            'number_of_guests' => 'required|between:1,' . $this->route('restaurant')->reservationCount($this->time),
        ];
    }
}
