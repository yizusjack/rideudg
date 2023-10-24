<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\PlaceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hola', function () {
    return view('main');
});

Route::get('prueba', function () {
    return view('prueba');
});

Route::resource('place', PlaceController::class)
->middleware('auth');

//CARS
Route::resource('car', CarController::class)
->middleware('auth');

Route::get('car/{car}/createP',
    [CarController::class, 'createP'])
    ->name('car.createp')
    ->middleware('auth');

Route::post('car/{car}/storeP',
    [CarController::class, 'storeP'])
    ->name('car.storep')
    ->middleware('auth');

//RIDES
Route::resource('ride', RideController::class)
->middleware('auth');

Route::get('ride/{user}/myRides',
    [RideController::class, 'myRides'])
    ->name('ride.myRides')
    ->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
