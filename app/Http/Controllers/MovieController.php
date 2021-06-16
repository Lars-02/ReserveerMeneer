<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class MovieController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Movie::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('movie.index', ['movies' => Movie::paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('movie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(MovieRequest $request)
    {
        $movie = Movie::create($request->validated());
        return redirect(route('movie.show', $movie));
    }

    /**
     * Display the specified resource.
     *
     * @param Movie $movie
     * @return Application|Factory|View
     */
    public function show(Movie $movie)
    {
        return view('movie.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Movie $movie
     * @return Application|Factory|View
     */
    public function edit(Movie $movie)
    {
        return view('movie.edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Movie $movie
     * @return Application|RedirectResponse|Redirector
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->validated());
        return redirect(route('movie.show', $movie));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Movie $movie
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect(route('movie.index'));
    }
}
