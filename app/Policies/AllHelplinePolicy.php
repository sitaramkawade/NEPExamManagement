<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AllHelplinePolicy
{
    use HandlesAuthorization;

  
    public function checkPermission(User $user)
    {
        return $user->hasRole('admin');
    }
}
