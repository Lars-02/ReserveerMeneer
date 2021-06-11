<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MovieTicketRequest extends FormRequest
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
            'user_id' => Auth::user()->id,
            'movie_slot_id' => $this->route('movie_slot')->id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $cinemaHall = $this->route('movie_slot')->cinemaHall;
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'movie_slot_id' => 'required|numeric|exists:movie_slot,id',
            'row' => 'required|numeric|between:1,' . $cinemaHall->totalRows(),
            'column' => 'required|numeric|between:1,' . $cinemaHall->cinemaHallRows,
            'seats' => 'required|numeric|between:1,' . $cinemaHall->cinemaHallRows->where(''),
        ];
    }
}
