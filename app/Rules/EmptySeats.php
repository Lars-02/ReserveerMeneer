<?php

namespace App\Rules;

use App\Models\CinemaHallRow;
use App\Models\MovieSlot;
use App\Models\MovieTicket;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Collection;

class EmptySeats implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        /** @var MovieSlot $movieSlot */
        $movieSlot = $value['movie_slot'];
        $startColumn = $value['column'];
        $seats = $value['seats'];

        $rowMovieTickets = MovieTicket::where('movie_slot_id', $movieSlot->id)->where('row', $value['row'])->pluck('column');
        $rowMovieTickets = $rowMovieTickets->map(function ($item) {
            return [$item + 2, $item + 1, $item, $item - 1, $item - 2];
        })->flatten()->unique();
        for ($column = $startColumn; $column < $startColumn + $seats; $column++) {
            if (!$rowMovieTickets->every(function ($value) use ($column) {
                return $value != $column;
            }))
                return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.full_seat');
    }
}
