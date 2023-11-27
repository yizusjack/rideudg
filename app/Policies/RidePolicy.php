<?php

namespace App\Policies;

use App\Models\Ride;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class RidePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): response
    {
        return ($user->type_u == 3 or $user->type_u == 7)
        ? Response::allow()
        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): response
    {
        return ($user->type_u == 3 or $user->type_u == 7)
        ? Response::allow()
        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Ride $ride): response
    {
        return ($ride->cars->users_id ==  $user->id)
        ? Response::allow()
        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Ride $ride): response
    {
        return ($ride->cars->users_id ==  $user->id)
        ? Response::allow()
        : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Ride $ride): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Ride $ride): bool
    {
        //
    }
}
