<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\EventTicket;
use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ReservationController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Reservation::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(User $user = null)
    {
        if(empty($user))
            $user = Auth::user();
        return view('restaurant.reservation.index', ['reservations' => Reservation::where('user_id', $user->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Restaurant $restaurant)
    {
        return view('restaurant.reservation.create', ['restaurant' => $restaurant]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReservationRequest $request
     * @return void
     */
    public function store(ReservationRequest $request)
    {
        EventTicket::create($request->all(['restaurant_id', 'user_id', 'time', 'number_of_guests', 'queued']));
        return redirect(route('event.ticket.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param Reservation $reservation
     * @return void
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Reservation $reservation
     * @return void
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ReservationRequest $request
     * @param Reservation $reservation
     * @return void
     */
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reservation $reservation
     * @return void
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->back();
    }
}
