<?php

namespace App\Http\Requests;

use App\Rules\MaxUserTickets;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EventTicketRequest extends FormRequest
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
            'event_id' => $this->route('event')->id,
            'total_tickets' => ['user' => Auth::user(), 'event' => $this->route('event')]
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
            'user_id' => 'required|numeric|exists:users,id',
            'event_id' => 'required|numeric|exists:events,id',
            'total_tickets' => new MaxUserTickets(),
            'firstname' => [
                'required', 'string', 'between:2,24', "regex:/^[a-z ,.'-]+$/i",
                Rule::unique('event_tickets')->where(function ($query) use ($request) {
                    return $query
                        ->where('event_id', $request['event_id'])
                        ->where('user_id', $request['user_id'])
                        ->where('firstname', $request['firstname'])
                        ->where('lastname', $request['lastname']);
                }),
            ],
            'lastname' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'birthday' => 'required|date|after_or_equal:-100 Years|before_or_equal:-16 Years',
            'photo_path' => 'required|image|max:2048',
            'start' => 'required|date|after_or_equal:' . $this->route('event')->start,
            'end' => 'required|date|after_or_equal:start_at|before_or_equal:' . $this->route('event')->end
        ];
    }
}
