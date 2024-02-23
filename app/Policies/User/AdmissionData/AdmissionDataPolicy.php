<?php

namespace App\Policies\User\AdmissionData;

use App\Models\Role;
use App\Models\User;
use App\Models\Admissiondata;
use Illuminate\Auth\Access\Response;

class AdmissionDataPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function access(User $user): bool
    {
        $allowedRoleIds = [1, 6];

        return in_array($user->role_id, $allowedRoleIds);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Admissiondata $admissiondata): bool
    {
        $allowedRoleIds = [1, 6];

        return in_array($user->role_id, $allowedRoleIds);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {   
        $allowedRoleIds = [1, 6];

        return in_array($user->role_id, $allowedRoleIds);
    }

    /**
     * Determine whether the user can edit the model.
     */
    public function edit(User $user, Admissiondata $admissiondata): bool
    {   
        // roles
        // 1 super admin
        // 2 admin
        // 3 clerk
        // 4 coe
        // 5 admissionclerk
        // 6 Principal and Head
        // role types
        // 1 system admin

        //    $roles = Role::where('college_id',$user->college_id)->whereIn('id',[1,6])->whereIn('roletype_id',[1])->pluck('id');

        //    $roles = Role::where('college_id',$user->college_id)->whereIn('id',[1,6])->pluck('id')->toArray();

        //     if($roles->array_key_exists(  $user->role_id))
        //     {   
        //         return true;
        //     }else
        //     {
        //         return false;
        //     }
        

        $allowedRoleIds = [1, 6];

        return in_array($user->role_id, $allowedRoleIds);

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Admissiondata $admissiondata): bool
    {
        $allowedRoleIds = [1, 6];

        return in_array($user->role_id, $allowedRoleIds);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Admissiondata $admissiondata): bool
    {
        $allowedRoleIds = [1, 6];

        return in_array($user->role_id, $allowedRoleIds);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Admissiondata $admissiondata): bool
    {
        $allowedRoleIds = [1, 6];

        return in_array($user->role_id, $allowedRoleIds);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forcedelete(User $user, Admissiondata $admissiondata): bool
    {
        $allowedRoleIds = [1, 6];

        return in_array($user->role_id, $allowedRoleIds);
    }
}
