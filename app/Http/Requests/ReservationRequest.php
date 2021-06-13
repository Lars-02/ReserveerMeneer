<?php

namespace App\Http\Requests;

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
        dd($this->time, $this->time->format('i') % 30);
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
            'time' => 'required',
            'queued' => 'required',
            'number_of_guests' => 'required',
        ];
    }
}
