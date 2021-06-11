<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EventRequest extends FormRequest
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
            'country_code' => strtoupper($this->country_code),
            'house_number' => strtoupper($this->country_code),
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
            'name' => "required|unique:events,name|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'start_date' => 'required|date|after_or_equal:-3 Years',
            'end_date' => 'required|date|after_or_equal:start_date',
            'city' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'streetname' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'house_number' => "required|alpha_num|between:1,10",
            'country_code' => "required|alpha|size:2|regex:/^[A-Z]{2}$/i",
            'max_user_tickets' => 'required|numeric|between:1,20',
            'total_tickets' => 'required|numeric|between:40,10000',
        ];
    }
}
