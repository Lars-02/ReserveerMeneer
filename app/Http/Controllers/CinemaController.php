<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return void
     */
    public function edit(Cinema $cinema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cinema $cinema
     * @return void
     */
    public function update(Request $request, Cinema $cinema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cinema $cinema
     * @return void
     */
    public function destroy(Cinema $cinema)
    {
        //
    }
}
