<?php

namespace App\Http\Controllers;

use App\Models\MovieTicket;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\MovieTicket $movieTicket
     * @return \Illuminate\Http\Response
     */
    public function show(MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\MovieTicket $movieTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\MovieTicket $movieTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovieTicket $movieTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\MovieTicket $movieTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieTicket $movieTicket)
    {
        //
    }
}
