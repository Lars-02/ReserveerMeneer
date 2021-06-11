<?php

namespace App\Http\Controllers;

use App\Models\CinemaHall;
use App\Models\Movie;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class MovieSlotController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return void
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize('viewAny');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Movie $movie
     * @return void
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CinemaHall $cinemaHall
     * @param Movie $movie
     * @return void
     */
    public function edit(CinemaHall $cinemaHall, Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param CinemaHall $cinemaHall
     * @param Movie $movie
     * @return void
     */
    public function update(Request $request,CinemaHall $cinemaHall,  Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CinemaHall $cinemaHall
     * @param Movie $movie
     * @return void
     */
    public function destroy(CinemaHall $cinemaHall, Movie $movie)
    {
        //
    }
}
