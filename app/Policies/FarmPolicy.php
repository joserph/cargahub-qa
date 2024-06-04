<?php

namespace App\Policies;

use App\Models\Farm;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FarmPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_farm');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Farm $farm): bool
    {
        return $user->can('view_farm');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_farm');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Farm $farm): bool
    {
        return $user->can('update_farm');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Farm $farm): bool
    {
        return $user->can('delete_farm');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Farm $farm): bool
    {
        return $user->can('restore_farm');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Farm $farm): bool
    {
        return $user->can('force_delete_farm');
    }
}
