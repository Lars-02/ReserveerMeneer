<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'event_id' => 'required|numeric|exists:events,id',
            'firstname' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'lastname' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'birthday' => 'required|date|after_or_equal:-100 Years',
            'photo_path' => 'required|image|max:2048',
            'start_at' => 'required|date|after_or_equal:'.$this->route('event')->start_date,
            'end_at' => 'required|date|after:start_at|before_or_equal:'.$this->route('event')->end_date
        ];
    }
}
