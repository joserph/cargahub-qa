<?php

namespace App\Policies;

use App\Models\Dialing;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DialingPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_dialing');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Dialing $dialing): bool
    {
        return $user->can('view_dialing');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_dialing');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Dialing $dialing): bool
    {
        return $user->can('update_dialing');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Dialing $dialing): bool
    {
        return $user->can('delete_dialing');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Dialing $dialing): bool
    {
        return $user->can('restore_dialing');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Dialing $dialing): bool
    {
        return $user->can('force_delete_dialing');
    }
}
