<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTicketRequest;
use App\Models\Event;
use App\Models\EventTicket;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class EventTicketController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(EventTicket::class);
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
     * @param Event $event
     * @return Application|Factory|View
     */
    public function create(Event $event)
    {
        return view('event.ticket.create', compact(['event']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventTicketRequest $request
     * @param Event $event
     * @return Application|RedirectResponse|Redirector
     */
    public function store(EventTicketRequest $request, Event $event)
    {
        $validated = $request->validated();
        $validated['photo_path'] = $validated['photo_path']->store('photos');
        $ticket = EventTicket::create($validated);
        return redirect(route('event.ticket.show', compact(['ticket'])));
    }

    /**
     * Display the specified resource.
     *
     * @param EventTicket $eventTicket
     * @return void
     */
    public function show(EventTicket $eventTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EventTicket $eventTicket
     * @return void
     */
    public function edit(EventTicket $eventTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventTicketRequest $request
     * @param EventTicket $eventTicket
     * @return void
     */
    public function update(EventTicketRequest $request, EventTicket $eventTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EventTicket $eventTicket
     * @return void
     */
    public function destroy(EventTicket $eventTicket)
    {
        //
    }
}
