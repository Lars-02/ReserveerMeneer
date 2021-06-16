<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\CinemaHall;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class CinemaHallController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(CinemaHall::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request, Cinema $cinema)
    {
        CinemaHall::create(['cinema_id' => $cinema->id]);
        return redirect(route('cinema.show', $cinema));
    }

    /**
     * Display the specified resource.
     *
     * @param CinemaHall $cinemaHall
     * @return Application|Factory|View
     */
    public function show(CinemaHall $cinemaHall)
    {
        return view('cinema.hall.show', ['cinema_hall' => $cinemaHall]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CinemaHall $cinemaHall
     * @return void
     */
    public function destroy(CinemaHall $cinemaHall)
    {
        $cinemaHall->delete();
        return redirect(route('cinemahall.index'));
    }
}
