<?php

namespace App\Policies;

use App\Models\Mycompany;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MyCompanyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_my::company');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Mycompany $mycompany): bool
    {
        return $user->can('view_my::company');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_my::company');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Mycompany $mycompany): bool
    {
        return $user->can('update_my::company');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Mycompany $mycompany): bool
    {
        return $user->can('delete_my::company');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Mycompany $mycompany): bool
    {
        return $user->can('restore_my::company');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Mycompany $mycompany): bool
    {
        return $user->can('force_delete_my::company');
    }
}
