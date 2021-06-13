<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\CinemaHallController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieSlotController;
use App\Http\Controllers\MovieTicketController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TicketController;
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
    Route::post('{event}', [EventTicketController::class, 'store'])
        ->name('ticket.store');
    Route::delete('ticket/{event_ticket}', [EventTicketController::class, 'destroy'])
        ->name('ticket.destroy');
    Route::get('{event}/buy', [EventTicketController::class, 'create'])
        ->name('buy');
});

Route::group(['prefix' => 'movie', 'as' => 'movie.'], function () {
    Route::get('ticket/{user?}', [MovieTicketController::class, 'index'])
        ->name('ticket.index');
    Route::post('{movie_slot}', [MovieTicketController::class, 'store'])
        ->name('ticket.store');
    Route::delete('ticket/{movie_ticket}', [MovieTicketController::class, 'destroy'])
        ->name('ticket.destroy');
    Route::get('{movie_slot}/buy', [MovieTicketController::class, 'create'])
        ->name('buy');
});

Route::resource('movie', MovieController::class);

Route::resource('cinema', CinemaController::class);

Route::resource('restaurant', RestaurantController::class);

Route::group(['prefix' => 'cinema', 'as' => 'cinema'], function () {
    Route::resource('hall', CinemaHallController::class, ['parameters' => [
        'hall' => 'cinema_hall'
    ], 'except' => 'index']);
    Route::group(['prefix' => 'hall/{cinema_hall}'], function () {
        Route::resource('movie', MovieSlotController::class, ['parameters' => [
            'hall' => 'cinema_hall'
        ], 'except' => 'index']);
    });
});



Route::resource('event', EventController::class)
    ->except('show');

Auth::routes();
