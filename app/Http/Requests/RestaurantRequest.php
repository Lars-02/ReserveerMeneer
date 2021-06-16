<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $request = $this->request->all();
        return [
            'restaurant_type_id' => 'required|numeric|exists:restaurant_types,id',
            'name' => "required|unique:restaurants,name" . (empty($this->restaurant) ? '' : ',' . $this->restaurant->id) . "|string|between:2,48|regex:/^[a-z ,.'-]+$/i",
            'seats' => 'required|numeric|between:40,400',
            'max_slot_reservations' => 'required|numeric|between:5,20',
            'city' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'streetname' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'house_number' => "required|alpha_num|between:1,10",
            'country_code' => "required|alpha|size:2|regex:/^[A-Z]{2}$/i",
        ];
    }
}

