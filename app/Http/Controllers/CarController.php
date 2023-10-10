<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.insertCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca_c' => ['required', 'max: 255'],
            'model_c' => ['required', 'max: 255'],
            'color_c' => ['required', 'max: 255'],
            'placas_c' => ['required', 'min: 6', 'max: 7'],
        ]);

        $placa = $request->placas_c;
        $request['users_id'] = Auth::user()->id;
        $request['placas_c'] = Crypt::encryptString($placa);

        Car::create($request->all());

        return redirect('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
