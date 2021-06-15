<?php

namespace App\Http\Requests;

use App\Rules\EmptySeats;
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
            'empty_seat' => ['movie_slot' => $this->route('movie_slot'), 'row' =>  $this->row, 'column' => $this->column, 'seats' => $this->seats],
            'age' => Auth::user()->birthday,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $cinemaHallRow = $this->route('movie_slot')->cinemaHall->cinemaHallRows->firstWhere('row', $this->row);
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'movie_slot_id' => 'required|numeric|exists:movie_slot,id',
            'empty_seat' => new EmptySeats(),
            'row' => 'required|numeric|between:1,' . $this->route('movie_slot')->cinemaHall->totalRows(),
            'column' => 'required|numeric|between:1,' . $cinemaHallRow->number_of_seats,
            'seats' => 'required|numeric|between:1,' . ($cinemaHallRow->number_of_seats - $this->column + 1),
            'age' => 'required|date|before_or_equal:-' . $this->route('movie_slot')->movie->minimum_age . ' Years'
        ];
    }
}
