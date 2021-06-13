<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieTicketRequest;
use App\Models\MovieSlot;
use App\Models\MovieTicket;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class MovieTicketController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(MovieTicket::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(MovieSlot $movieSlot)
    {
        return view('movie.ticket.create', ['movieSlot' => $movieSlot]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MovieTicketRequest $request
     * @param MovieSlot $movieSlot
     * @return Application|RedirectResponse|Redirector
     */
    public function store(MovieTicketRequest $request, MovieSlot $movieSlot)
    {
        for ($seat = $request->get('column'); $seat < $request->get('column') + $request->get('seats'); $seat++) {
            MovieTicket::create(array_merge($request->all('user_id', 'movie_slot_id',
                'row'), ['column' => $seat]));
        }
        return redirect(route('movie.ticket.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param MovieTicket $movieTicket
     * @return void
     */
    public function show(MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MovieTicket $movieTicket
     * @return void
     */
    public function edit(MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param MovieTicket $movieTicket
     * @return void
     */
    public function update(Request $request, MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MovieTicket $movieTicket
     * @return void
     */
    public function destroy(MovieTicket $movieTicket)
    {
        //
    }
}
