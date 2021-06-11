<?php

use App\Http\Controllers\CinemaController;
use App\Http\Controllers\CinemaHallController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTicketController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
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

Route::resource('cinema', CinemaController::class);

Route::group(['prefix' => 'cinema', 'as' => 'cinema'], function () {
    Route::resource('hall', CinemaHallController::class, ['parameters' => [
        'hall' => 'cinema_hall'
    ], 'except' => 'index']);
    Route::group(['prefix' => 'hall/{cinema_hall}'], function () {
        Route::resource('movie', CinemaHallController::class, ['parameters' => [
            'hall' => 'cinema_hall'
        ], 'except' => 'index']);
    });
});



Route::resource('event', EventController::class)
    ->except('show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
