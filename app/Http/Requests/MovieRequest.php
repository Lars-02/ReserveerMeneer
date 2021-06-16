<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'duration' => date("H:i:s", strtotime($this->duration)),
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
            'name' => "required|unique:movies,name" . (empty($this->movie) ? '' : ',' . $this->movie->id) . "|string|between:2,48|regex:/^[a-z ,.'-]+$/i",
            'duration' => 'required|date_format:H:i:s',
            'minimum_age' => 'required|numeric|in:0,3,6,9,12,16,18'
        ];
    }
}
