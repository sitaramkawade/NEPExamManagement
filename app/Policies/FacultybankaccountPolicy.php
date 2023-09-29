<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\Facultybankaccount;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FacultybankaccountPolicy
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
    public function view(User $user, Facultybankaccount $facultybankaccount): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Faculty $user, Facultybankaccount $facultybankaccount): bool
    { 
        
        return $facultybankaccount->acc_verified===0;
                
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Facultybankaccount $facultybankaccount): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Facultybankaccount $facultybankaccount): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Facultybankaccount $facultybankaccount): bool
    {
        //
    }
}
