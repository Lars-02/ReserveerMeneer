<?php

namespace App\Http\Controllers;

use App\Http\Requests\RestaurantRequest;
use App\Models\Restaurant;
use App\Models\RestaurantType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class RestaurantController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Restaurant::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('restaurant.index', ['types' => Restaurant::all()->groupBy(function ($item) {
            return $item->restaurantType->type;
        })]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $types = RestaurantType::all()->mapWithKeys(function ($item) {
            return [$item['id'] => $item['type']];
        });
        return view('restaurant.create', ['types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RestaurantRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(RestaurantRequest $request)
    {
        Restaurant::create($request->validated());
        return redirect(route('restaurant.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Restaurant $restaurant
     * @return Application|Factory|View
     */
    public function edit(Restaurant $restaurant)
    {
        $types = RestaurantType::all()->mapWithKeys(function ($item) use ($restaurant) {
            return [$item['id'] => [$restaurant->restaurantType->id === $item['id'], $item['type']]];
        });
        return view('restaurant.edit', ['restaurant' => $restaurant, 'types' => $types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RestaurantRequest $request
     * @param Restaurant $restaurant
     * @return Application|Redirector|RedirectResponse
     */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $restaurant->update($request->validated());
        return redirect(route('restaurant.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Restaurant $restaurant
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect(route('restaurant.index'));
    }
}

