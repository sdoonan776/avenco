<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /** 
     * Checks that the user is authorized to access
     * the resource
     */
    public function before(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    /**
     * Determines that the user can store the resource
    */ 
    public function store(User $user)
    {
           
    }

    /**
    * Determines that the user can update the resource
    */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    /**
    * Determines that the user can update the resource
    */
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->id === $user-id; 
    } 
    
}
