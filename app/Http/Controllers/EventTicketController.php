<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTicketRequest;
use App\Models\Event;
use App\Models\EventTicket;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
     * @return Application|Factory|View
     */
    public function index(User $user = null)
    {
        if(empty($user))
            $user = Auth::user();
        return view('event.ticket.index', ['tickets' => EventTicket::where('user_id', $user->id)->paginate(15)]);
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
        unset($validated['total_tickets']);
        EventTicket::create($validated);
        return redirect(route('event.ticket.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EventTicket $eventTicket
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(EventTicket $eventTicket): RedirectResponse
    {
        $eventTicket->delete();
        return redirect()->back();
    }

    /**
     * @throws AuthorizationException
     */
    public function downloadJSON(User $user = null): BinaryFileResponse
    {
        $this->authorize('download', EventTicket::class);

        if(empty($user))
            $user = Auth::user();

        $tickets = EventTicket::where('user_id', $user->id)->get(['id', 'event_id', 'user_id', 'start_at', 'end_at', 'firstname', 'lastname', 'birthday']);
        $filename = "tickets.json";
        $handle = fopen($filename, 'w+');
        fputs($handle, $tickets->toJson(JSON_PRETTY_PRINT));
        fclose($handle);
        $headers = array('Content-type'=> 'application/json');
        return response()->download($filename,'tickets.json',$headers);
    }

    /**
     * @param User|null $user
     * @return StreamedResponse
     * @throws AuthorizationException
     */
    public function downloadCSV(User $user = null): StreamedResponse
    {
        $this->authorize('download', EventTicket::class);

        if(empty($user))
            $user = Auth::user();

        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=tickets.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $tickets = EventTicket::where('user_id', $user->id)->get();
        $columns = array('Ticket ID', 'Event ID', 'User ID', 'Start at', 'Ends at', 'Firstname', 'Lastname', 'Birthday');

        $callback = function() use ($tickets, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($tickets as $ticket) {
                fputcsv($file, array($ticket->id, $ticket->event_id, $ticket->user_id, $ticket->start_at, $ticket->end_at, $ticket->firstname, $ticket->lastname, $ticket->birthday));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }
}
