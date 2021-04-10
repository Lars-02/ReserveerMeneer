<?php

namespace App\Http\Controllers;

use App\Models\CinemaHall;
use App\Models\MovieSlot;
use App\Models\MovieTicket;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return MovieSlot::all()->find(1)->cinemaHall->cinemaHallRows->offsetGet(0)->number_of_seats;
//        return view('home');
    }
}
