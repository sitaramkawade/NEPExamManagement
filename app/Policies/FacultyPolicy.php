<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Faculty;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class FacultyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(): bool
    {
        $allowedRoles = ['System Admin'];

        $hasActionPermission = in_array(auth('faculty')->user()->role->roletype->roletype_name, $allowedRoles);

        return $hasActionPermission;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view()
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin','Non Teaching', 'Management Member',]);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(): bool
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
     * Determine whether the user can delete the model.
     */
    public function delete(): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(): bool
    {
        $faculty = auth('faculty')->user()->role->roletype->roletype_name;
        return in_array($faculty, ['System Admin',]);
    }
}
