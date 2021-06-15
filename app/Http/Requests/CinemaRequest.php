<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CinemaRequest extends FormRequest
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
            'house_number' => strtoupper($this->house_number),
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
            'name' => "required|unique:cinemas,name" . (empty($this->cinema) ? '' : ',' . $this->cinema->id) . "|string|between:2,48|regex:/^[a-z ,.'-]+$/i",
            'city' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'streetname' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'house_number' => "required|alpha_num|between:1,10",
            'country_code' => "required|alpha|size:2|regex:/^[A-Z]{2}$/i",
        ];
    }
}
