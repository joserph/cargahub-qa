<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Variety;
use Illuminate\Auth\Access\Response;

class VarietyPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_variety');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Variety $variety): bool
    {
        return $user->can('view_variety');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_variety');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Variety $variety): bool
    {
        return $user->can('update_variety');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Variety $variety): bool
    {
        return $user->can('delete_variety');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Variety $variety): bool
    {
        return $user->can('restore_variety');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Variety $variety): bool
    {
        return $user->can('force_delete_variety');
    }
}
