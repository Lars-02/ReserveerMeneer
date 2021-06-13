<?php

namespace App\Http\Requests;

use App\Models\Restaurant;
use App\Rules\IsAfterNow;
use App\Rules\IsTimeSlot;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        /** @var Restaurant $restaurant */
        $restaurant = $this->route('restaurant');
        $this->merge([
            'time' => date("Y-m-d H:i:s", strtotime($this->time)),
            'user_id' => Auth::user()->id,
            'restaurant_id' => $restaurant->id,
            'queued' => $restaurant->seats - $restaurant->reservationCount($this->time) < $this->number_of_guests,
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
        /** @var Restaurant $restaurant */
        $restaurant = $this->route('restaurant');
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'restaurant_id' => 'required|numeric|exists:restaurants,id',
            'time' => ['required', 'date', 'date_format:Y-m-d H:i:s', new IsTimeSlot(), new IsAfterNow,],
            'queued' => 'required|bool',
            'number_of_guests' => 'required|numeric|min:1',
        ];
    }
}
