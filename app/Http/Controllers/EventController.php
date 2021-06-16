<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class EventController extends Controller
{

    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Event::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        return view('event.index', ['events' => Event::paginate(15)]);
    }

    /**s
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(EventRequest $request)
    {
        Event::create($request->validated());
        return redirect(route('event.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Application|Factory|View
     */
    public function edit(Event $event)
    {
        return view('event.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return Application|RedirectResponse|Redirector
     */
    public function update(EventRequest $request, Event $event)
    {
        $event->update($request->validated());
        return redirect(route('event.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return Application|Redirector|RedirectResponse
     * @throws Exception
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect(route('event.index'));
    }
}
