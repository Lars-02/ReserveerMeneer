<?php


namespace App\Models;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class Pagination
{

    /**
     *
     * @param array|Collection $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     *
     * @return LengthAwarePaginator
     */
    public static function paginate($items, int $perPage = 15, $page = null, array $options = []): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
