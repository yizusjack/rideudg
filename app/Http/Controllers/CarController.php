<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Color;
use App\Models\Marca;
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
        $cars = Car::with(['users', 'marcas', 'colors'])->get();

        return view('cars.carIndex', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();
        $colors = Color::all();
        
        return view('cars.insertCar', compact('marcas', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $request->validate([
            'marcas_id' => ['required', 'exists:marcas,id'],
            'model_c' => ['required', 'max: 255'],
            'colors_id' => ['required', 'exists:colors,id'],
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
