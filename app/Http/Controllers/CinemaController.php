<?php

namespace App\Http\Controllers;


use App\Http\Requests\CinemaRequest;
use App\Models\Cinema;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class CinemaController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Cinema::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('cinema.index', ['cinemas' => Cinema::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('cinema.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CinemaRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(CinemaRequest $request)
    {
        $cinema = Cinema::create($request->validated());
        return redirect(route('cinema.show', $cinema));
    }

    /**
     * Display the specified resource.
     *
     * @param Cinema $cinema
     * @return Application|Factory|View
     */
    public function show(Cinema $cinema)
    {
        return view('cinema.show', ['cinema' => $cinema]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cinema $cinema
     * @return Application|Factory|View
     */
    public function edit(Cinema $cinema)
    {
        return view('cinema.edit', ['cinema' => $cinema]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CinemaRequest $request
     * @param Cinema $cinema
     * @return Application|Redirector|RedirectResponse
     */
    public function update(CinemaRequest $request, Cinema $cinema)
    {
        $cinema->update($request->validated());
        return redirect(route('cinema.show', $cinema));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cinema $cinema
     * @return RedirectResponse|Application|Redirector
     * @throws Exception
     */
    public function destroy(Cinema $cinema)
    {
        $cinema->delete();
        return redirect(route('cinema.index'));
    }
}
