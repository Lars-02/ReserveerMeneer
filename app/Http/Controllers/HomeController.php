<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeRequest;
use App\Models\Event;
use App\Models\MovieSlot;
use App\Models\Pagination;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param HomeRequest $request
     * @return Renderable
     */
    public function index(HomeRequest $request): Renderable
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

        $from = null;
        $until = null;
        if (!empty($request->get('from')) && !empty($request->get('until'))) {
            $from = $request->get('from');
            $until = $request->get('until');

            $items = $items->whereBetween('start', [$from, $until]);
        }

        if (!empty($request->get('sort')))
            $items = $items->sortBy(function ($item) use ($request) {
                if (get_class($item) == MovieSlot::class && $request->get('sort') == 'name')
                    return $item->movie[$request->get('sort')];
                return $item[$request->get('sort')];
            });

        $items = Pagination::paginate($items, 20, $request->get('page'));

        return view('home', ['items' => $items, 'search' => $search, 'from' => $from, 'until' => $until]);
    }


}
