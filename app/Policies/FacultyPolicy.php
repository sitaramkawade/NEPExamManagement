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
        $allowedRoles = ['System Admin'];

        // Check if the faculty has any permission related to actions
        $hasActionPermission = in_array(auth('faculty')->user()->role->roletype->roletype_name, $allowedRoles);

        return $hasActionPermission;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Faculty $faculty): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin','Non Teaching', 'Management Member',]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Faculty $user, Faculty $faculty): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Faculty $faculty): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Faculty $faculty): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }

    public function changestatus(): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Faculty $faculty): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }
}
