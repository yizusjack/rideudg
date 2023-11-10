<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\UserController;
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
    

Route::get('approveCar',
    [CarController::class, 'approve'])
    ->name('car.approve')
    ->middleware('auth');

Route::post('car/{car}/approveC',
    [CarController::class, 'approveC'])
    ->name('car.approveC')
    ->middleware('auth');

Route::post('car/{car}/denyC',
    [CarController::class, 'denyC'])
    ->name('car.denyC')
    ->middleware('auth');

//RIDES
Route::resource('ride', RideController::class)
->middleware('auth');

Route::get('ride/{user}/myRides',
    [RideController::class, 'myRides'])
    ->name('ride.myRides')
    ->middleware('auth');

Route::get('ride/{ride}/seeStops',
    [RideController::class, 'seeStops'])
    ->name('ride.seeStops')
    ->middleware('auth');

Route::post('ride/{ride}/manageStops',
    [RideController::class, 'manageStops'])
    ->name('ride.manageStops')
    ->middleware('auth');

Route::post('ride/{ride}/requestStop',
    [RideController::class, 'requestStop'])
    ->name('ride.requestStop')
    ->middleware('auth');

//Users
Route::get('user',
    [UserController::class, 'index'])
    ->name('user.index')
    ->middleware('auth');

Route::post('user/{user}/addD',
    [UserController::class, 'addD'])
    ->name('user.addD')
    ->middleware('auth');

Route::post('user/{user}/addA',
    [UserController::class, 'addA'])
    ->name('user.addA')
    ->middleware('auth');


Route::post('user/{user}/quitD',
    [UserController::class, 'quitD'])
    ->name('user.quitD')
    ->middleware('auth');


    Route::post('user/{user}/quitA',
    [UserController::class, 'quitA'])
    ->name('user.quitA')
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
