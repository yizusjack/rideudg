<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Picture;
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
        //dd(count($request->picture));
        $request->validate([
            'marcas_id' => ['required', 'exists:marcas,id'],
            'model_c' => ['required', 'max: 255'],
            'colors_id' => ['required', 'exists:colors,id'],
            'placas_c' => ['required', 'min: 6', 'max: 7',],
        ]);

        //dd($request->except('_token'));

        $placa = $request->placas_c;
        $request['users_id'] = Auth::user()->id;
        $request['placas_c'] = Crypt::encryptString($placa);

        $car = Car::create($request->all());

        //dd($car);

        return redirect()->route('car.createp', $car);
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

    public function createP(Car $car)
    {
        return view('cars.insertCarPics', compact('car'));
    }

    public function storeP(Request $request, Car $car)
    {
        //dd($request);
        $request->validate([
            'picture_f' => ['required', 'image'],
            'picture_b' => ['required', 'image',],
            'picture_s' => ['required', 'image',],
            'picture_c' => ['required', 'image',],
        ]);
        
        $index = 1;
        foreach ($request->except('_token') as $req){
            $route = $req->store('public');
            $pictures = new Picture();
            $pictures->hash = $route;
            $pictures->nombre = $req->getClientOriginalName();
            $pictures->extension = $req->guessExtension();
            $pictures->mime = $req->getMimeType();
            $pictures->cars_id = $car->id;
            $pictures->type_p = $index; //si es administrador la aprobará, de lo contrario la deniega
            $pictures->save();
            $index++;
        }
        
        //dd($index);
        
        Car::where('id', $car->id)
        ->update(['picset_c' => true]);

        return redirect()->route('car.index');
    }
}
