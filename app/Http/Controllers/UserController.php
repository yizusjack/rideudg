<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('users.userIndex', compact('users'));
    }

    public function addD(User $user){
        if($user->type_u != 7 and $user->type_u != 3){
            $userC = User::where('id', $user->id)->first();
            $new = strval($user->type_u + 2);
            $userC->type_u = $new;
            $userC->waiting_u = false;
            $userC->save();
        }

        return redirect()->route('user.index');
    }

    public function quitD(User $user){
        if($user->type_u == 3 or $user->type_u == 7){
            $userC = User::where('id', $user->id)->first();
            $new = strval($user->type_u - 2);
            $userC->type_u = $new;
            $userC->save();
        }

        return redirect()->route('user.index');
    }

    public function addA(User $user){
        if($user->type_u < 5){
            $userC = User::where('id', $user->id)->first();
            $new = strval($user->type_u + 4);
            $userC->type_u = $new;
            $userC->save();
        }

        return redirect()->route('user.index');
    }

    public function quitA(User $user){
        if($user->type_u >=5){
            $userC = User::where('id', $user->id)->first();
            $new = strval($user->type_u - 4);
            $userC->type_u = $new;
            $userC->save();
        }

        return redirect()->route('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
