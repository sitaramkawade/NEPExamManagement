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
    public function viewAny(Faculty $faculty): bool
    {
        $allowedRoles = ['System Admin'];
        $roleType = $faculty->role->roletype->roletype_name;
        return in_array($roleType, $allowedRoles);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Faculty $faculty): bool
    {
        $allowedRoles = ['System Admin','Non Teaching', 'Management Member',];
        $roleType = $faculty->role->roletype->roletype_name;
        return in_array($roleType, $allowedRoles);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Faculty $faculty): bool
    {
        $allowedRoles = ['System Admin'];
        $roleType = $faculty->role->roletype->roletype_name;
        return in_array($roleType, $allowedRoles);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Faculty $faculty): bool
    {
        $allowedRoles = ['System Admin'];
        $roleType = $faculty->role->roletype->roletype_name;
        return in_array($roleType, $allowedRoles);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Faculty $faculty): bool
    {
        $allowedRoles = ['System Admin'];
        $roleType = $faculty->role->roletype->roletype_name;
        return in_array($roleType, $allowedRoles);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Faculty $faculty): bool
    {
        $allowedRoles = ['System Admin'];
        $roleType = $faculty->role->roletype->roletype_name;
        return in_array($roleType, $allowedRoles);
    }

    public function changestatus(Faculty $faculty): bool
    {
        $allowedRoles = ['System Admin'];
        $roleType = $faculty->role->roletype->roletype_name;
        return in_array($roleType, $allowedRoles);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Faculty $faculty): bool
    {
        $allowedRoles = ['System Admin'];
        $roleType = $faculty->role->roletype->roletype_name;
        return in_array($roleType, $allowedRoles);
    }
}
