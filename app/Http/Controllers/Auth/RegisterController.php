<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:24'],
            'lastname' => ['required', 'string', 'max:24'],
            'birthday' => 'required|date|after_or_equal:-100 Years|before_or_equal:-16 Years',
            'city' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'streetname' => "required|string|between:2,24|regex:/^[a-z ,.'-]+$/i",
            'house_number' => "required|alpha_num|between:1,10",
            'country_code' => "required|alpha|size:2|regex:/^[A-Z]{2}$/i",
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'between:8,255', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'birthday' => $data['birthday'],
            'city' => $data['city'],
            'streetname' => $data['streetname'],
            'house_number' => $data['house_number'],
            'country_code' => $data['country_code'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
