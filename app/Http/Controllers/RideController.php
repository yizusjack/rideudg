<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Ride;
use App\Models\User;
use App\Models\Place;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rides = Ride::whereDate('date_t', '>=', Carbon::today()->toDateString())->get();
        return view('rides.ridesIndex', compact('rides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $places = Place::all();
        $cars = Car::where('users_id', Auth::user()->id)->get();
        return view('rides.createRide', compact('places', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'date_t' => ['required', 'date',],
            'hour_t' => ['required', 'date_format:H:i',],
            'passengers_t' => ['required', 'numeric', 'min:1',],
            'places_id' => ['required', 'exists:places,id',],
            'destiny_id' => ['required', 'exists:places,id',],
            'cars_id' => ['required', 'exists:cars,id'],
        ]);

        $car = Car::where('id', $request->cars_id)->first();


        if($car->users_id == Auth::user()->id){
            Ride::create($request->all());
            return redirect()->route('ride.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ride $ride)
    {
        //dd($ride->users); 
        $pic = Picture::where('cars_id', $ride->cars_id)
        ->where('type_p', 4)
        ->first();
        $placa = Crypt::decryptString($ride->cars->placas_c);
        return view('rides.showRide', compact('ride', 'placa', 'pic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ride $ride)
    {
        $places = Place::all();
        $cars = Car::where('users_id', Auth::user()->id)->get();
        return view('rides.editRide', compact('places', 'cars', 'ride'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ride $ride)
    {
        $request->validate([
            'date_t' => ['required', 'date',],
            'hour_t' => ['required', 'date_format:H:i',],
            'passengers_t' => ['required', 'numeric', 'min:1',],
            'places_id' => ['required', 'exists:places,id',],
            'destiny_id' => ['required', 'exists:places,id',],
            'cars_id' => ['required', 'exists:cars,id'],
        ]);

        Ride::where('id', $ride->id)
        ->update($request->except('_token', '_method'));

        return redirect()->route('ride.myRides', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ride $ride)
    {
        $ride->delete();
        return redirect()->route('ride.myRides', Auth::user()->id);
    }

    public function myRides(User $user){
        $cars = Car::select('id')->where('users_id', $user->id);
        $rides = Ride::with(['placesB', 'placesF', 'cars'])
        ->whereIn('cars_id', $cars) //If The car is within the cars array made in the previous instruction
        ->whereDate('date_t', '>=', Carbon::today()->toDateString())
        ->get(); 
        return view('rides.myRides', compact('rides'));
    }

    public function seeStops(Ride $ride){
        $places = Place::all();
        return view('rides.addStops', compact('ride', 'places'));
    }

    public function manageStops(Request $request, Ride $ride){
        //dd($request);
        $ride->stops()->sync($request->place_id);
        return redirect()->route('ride.show', $ride);
    }

    public function requestStop(Request $request, Ride $ride){
        //dd($request);
        $ride->users()->attach(Auth::user()->id, ['places_id'=>$request->places_id, 'approved_u'=>false]);
        //$ride->stops()->sync($request->place_id);
        return redirect()->route('ride.show', $ride);
    }

    public function approveStop(Ride $ride, Place $place, User $user){
        //dd($ride);
        $ride->users()->detach($user->id);
        $ride->users()->attach($user->id, ['places_id'=>$place->id, 'approved_u'=>true]);
        //CORREO
        return redirect()->route('ride.show', $ride);
    }

    public function denyStop(Ride $ride, User $user){
        //dd($ride);
        $ride->users()->detach($user->id);
        //CORREO
        return redirect()->route('ride.show', $ride);
    }

}
