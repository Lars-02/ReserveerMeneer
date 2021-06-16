<?php

namespace App\Http\Controllers;

use App\Http\Requests\CinemaHallRowRequest;
use App\Models\CinemaHall;
use App\Models\CinemaHallRow;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class CinemaHallRowController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(CinemaHallRow::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(CinemaHall $cinemaHall)
    {
        return view('cinema.hall.row.create', ['cinema_hall' => $cinemaHall]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CinemaHallRowRequest $request
     * @param CinemaHall $cinemaHall
     * @return Application|RedirectResponse|Redirector
     */
    public function store(CinemaHallRowRequest $request, CinemaHall $cinemaHall)
    {
        CinemaHallRow::create($request->validated());
        return redirect(route('cinemahall.show', $cinemaHall));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CinemaHallRow $cinemaHallRow
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function destroy(CinemaHallRow $cinemaHallRow)
    {
        $cinemaHall = $cinemaHallRow->cinemaHall;
        if ($cinemaHallRow->row == $cinemaHall->totalRows())
            $cinemaHallRow->delete();
        return redirect(route('cinemahall.show', $cinemaHall));
    }
}
