<?php

namespace App\Http\Controllers;

use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Models\Cinema;
use App\Models\Event;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(Request $request)
    {
        $items = Event::all()->push(Cinema::all())->flatten();
        if (!empty($request->get('sort')))
            $items = $items->sortBy(function ($item) use ($request) {
                return $item[$request->get('sort')];
            });
        if (!empty($request->get('search'))) {
            $filters = explode(",", str_replace(", ", ",", $request['search']));
            $items = $items->filter(function ($item) use ($filters) {
                foreach ($filters as $filter) {
                    if (stripos($item->name, $filter) !== false)
                        return true;
                }
            });
        }

        return view('home', ['items' => $items]);
    }
}
