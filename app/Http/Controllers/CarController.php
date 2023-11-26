<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Color;
use App\Models\Marca;
use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

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

    public function approve()
    {
        return view('cars.approveCars');
    }


    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {

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
        
        Car::where('id', $car->id)
        ->update(['picset_c' => true]);

        if(Auth::user()->type_u != 3 and Auth::user()->type_u != 7){
            $user = User::where('id', Auth::user()->id)->first();
            $user->waiting_u = true;
            $user->save();
        }

        return redirect()->route('car.index');
    }

    public function approveC(Car $car){
        $pictures = Picture::where('cars_id', $car->id)
        ->whereIn('type_p', ['1', '2'])
        ->get();

        
        
        if($car->users->type_u == 1 or $car->users->type_u == 5){
            $val = $car->users->type_u+2;
            //dd($val);
            $user = User::where('id', $car->users_id)->first();
            $user->type_u = strval($val);
            $user->waiting_u = false;
            $user->save();
        }
        
        foreach($pictures as $picture){
            Storage::delete($picture->hash);
            $picture->delete();
        }


        $car->approved_c = true;
        $car->save();

        return redirect()->route('car.approve');
    }

    public function denyC(Car $car){
        $pictures = Picture::where('cars_id', $car->id)
        ->get();

        foreach($pictures as $picture){
            Storage::delete($picture->hash);
        }

        $car->delete();

        return redirect()->route('car.approve');
    }
}
