<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\CinemaHallController;
use App\Http\Controllers\CinemaHallRowController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieSlotController;
use App\Http\Controllers\MovieTicketController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/locale/{locale}', function ($locale) {
    if (file_exists(resource_path("lang/$locale")))
        session()->put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


Route::group(['prefix' => 'restaurant', 'as' => 'restaurant.'], function () {
    Route::get('reservation/{user?}', [ReservationController::class, 'index'])
        ->name('reservation.index');
    Route::post('{restaurant}', [ReservationController::class, 'store'])
        ->name('reservation.store');
    Route::delete('reservation/{reservation}', [ReservationController::class, 'destroy'])
        ->name('reservation.destroy');
    Route::get('{restaurant}/reserve', [ReservationController::class, 'create'])
        ->name('reserve');
});

Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::get('ticket/{user?}', [EventTicketController::class, 'index'])
        ->name('ticket.index');
    Route::get('ticket/{user}/download/json', [EventTicketController::class, 'downloadJSON'])
        ->name('ticket.download.json');
    Route::get('ticket/{user}/download/csv', [EventTicketController::class, 'downloadCSV'])
        ->name('ticket.download.csv');
    Route::post('{event}', [EventTicketController::class, 'store'])
        ->name('ticket.store');
    Route::delete('ticket/{event_ticket}', [EventTicketController::class, 'destroy'])
        ->name('ticket.destroy');
    Route::get('{event}/reserve', [EventTicketController::class, 'create'])
        ->name('buy');
});

Route::group(['prefix' => 'movie', 'as' => 'movie.'], function () {
    Route::get('ticket/{user?}', [MovieTicketController::class, 'index'])
        ->name('ticket.index');
    Route::post('ticket/{movie_slot}', [MovieTicketController::class, 'store'])
        ->name('ticket.store');
    Route::delete('ticket/{movie_ticket}', [MovieTicketController::class, 'destroy'])
        ->name('ticket.destroy');
    Route::get('{movie_slot}/reserve', [MovieTicketController::class, 'create'])
        ->name('buy');
    Route::get('ticket/{movie_ticket}/info', [MovieTicketController::class, 'show'])
        ->name('ticket.show');
});

Route::resource('movie', MovieController::class);

Route::resource('cinema', CinemaController::class);

Route::resource('restaurant', RestaurantController::class);

Route::post('cinema/{cinema}/hall/create', [CinemaHallController::class, 'store'])
    ->name('cinemahall.store');

Route::get('cinemahall/{cinema_hall}/row/create', [CinemaHallRowController::class, 'create'])
    ->name('cinemahall.row.create');
Route::post('cinemahall/{cinema_hall}/row', [CinemaHallRowController::class, 'store'])
    ->name('cinemahall.row.store');
Route::delete('cinemahall/row/{cinema_hall_row}', [CinemaHallRowController::class, 'destroy'])
    ->name('cinemahall.row.destroy');

Route::resource('cinemahall', CinemaHallController::class)
    ->parameter('cinemahall', 'cinema_hall')
    ->only('show', 'destroy');

Route::resource('event', EventController::class)
    ->except('show');

Auth::routes();
