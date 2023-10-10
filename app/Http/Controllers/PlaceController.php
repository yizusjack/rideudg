<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return view('places.indexPlace', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('places.createPlace');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_p' => ['required', 'max:255'],
            'address_p' => ['required', 'max:255'],
            'latitude_p' => ['required', 'min:-90', 'max:90', 'decimal:0,6'],
            'longitude_p' => ['required', 'min:-180', 'max:180', 'decimal:0,6'],
        ]);

        Place::create($request->all());
        return redirect('place');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        return view('places.editPlace', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Place $place)
    {
        $request->validate([
            'name_p' => ['required', 'max:255'],
            'address_p' => ['required', 'max:255'],
            'latitude_p' => ['required', 'min:-90', 'max:90', 'decimal:0,6'],
            'longitude_p' => ['required', 'min:-180', 'max:180', 'decimal:0,6'],
        ]);

        Place::where('id', $place->id)
        ->update($request->except('_token', '_method'));

        return redirect('place');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();
        return redirect('place');
    }
}
