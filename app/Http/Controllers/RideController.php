<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Ride;
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
            return redirect()->route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Ride $ride)
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ride $ride)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ride $ride)
    {
        //
    }
}
