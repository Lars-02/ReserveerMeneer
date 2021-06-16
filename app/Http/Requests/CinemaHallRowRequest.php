<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CinemaHallRowRequest extends FormRequest
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
            'row' => $this->cinema_hall->totalRows() + 1,
            'cinema_hall_id' => $this->route('cinema_hall')->id,
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public
    function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public
    function rules()
    {
        return [
            'cinema_hall_id' => 'required|numeric|exists:cinema_halls,id',
            'row' => "required|numeric|between:1,24",
            'number_of_seats' => "required|numeric|between:6,24",
        ];
    }
}
