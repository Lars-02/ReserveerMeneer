<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MovieSlot;
use App\Models\Pagination;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $items = Event::all()->push(MovieSlot::all())->flatten();

        $search = '';
        if (!empty($request->get('search'))) {
            $search = $request->get('search');
            $filters = explode(",", str_replace(", ", ",", $request['search']));
            $items = $items->filter(function ($item) use ($filters) {
                foreach ($filters as $filter) {
                    if (stripos($item->name, $filter) !== false)
                        return true;
                    if (stripos($item->city, $filter) !== false)
                        return true;
                    if (stripos($item->city, $filter) !== false)
                        return true;
                }
                return false;
            });
        }

        $items =  Pagination::paginate($items, 20, $request->get('page'));
        if (!empty($request->get('sort')))
            $items = $items->sortBy(function ($item) use ($request) {
                if (get_class($item) == Event::class)
                    return $item[$request->get('sort')];
                return $item->movie[$request->get('sort')];
            });

        return view('home', ['items' => $items, 'search' => $search]);
    }


}
