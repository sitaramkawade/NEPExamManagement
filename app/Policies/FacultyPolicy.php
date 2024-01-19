<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FacultyPolicy
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
    public function view(Faculty $faculty): bool
    {
        if ($faculty->designation_id === 1) {
            return false;
        } elseif ($faculty->designation_id === 2) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Faculty $user, Faculty $faculty): bool
    {
        return $faculty->faculty_verified===0;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Faculty $faculty): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Faculty $faculty): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Faculty $faculty): bool
    {
        //
    }
}
