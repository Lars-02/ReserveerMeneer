<?php

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

Route::resource('event', EventController::class);

Route::group(['prefix' => 'event', 'as' => 'event.'], function () {
    Route::get('ticket/{ticket}', [EventTicketController::class, 'show'])
        ->name('ticket.show');
    Route::post('{event}', [EventTicketController::class, 'store'])
        ->name('ticket.store');
    Route::get('{event}/buy', [EventTicketController::class, 'create'])
        ->name('buy');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
