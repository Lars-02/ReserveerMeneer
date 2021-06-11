<?php

namespace App\Http\Controllers;

use App\Models\CinemaHall;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param CinemaHall $cinemaHall
     * @return Application|Factory|View|Response
     */
    public function show(CinemaHall $cinemaHall)
    {
        return view('cinema.hall.show', ['cinema_hall' => $cinemaHall]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CinemaHall $cinemaHall
     * @return Response
     */
    public function edit(CinemaHall $cinemaHall)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CinemaHall $cinemaHall
     * @return Response
     */
    public function update(Request $request, CinemaHall $cinemaHall)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CinemaHall $cinemaHall
     * @return Response
     */
    public function destroy(CinemaHall $cinemaHall)
    {
        //
    }
}
