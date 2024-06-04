<?php

namespace App\Policies;

use App\Models\Disease;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DiseasePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_disease');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Disease $disease): bool
    {
        return $user->can('view_disease');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_disease');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Disease $disease): bool
    {
        return $user->can('update_disease');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Disease $disease): bool
    {
        return $user->can('delete_disease');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Disease $disease): bool
    {
        return $user->can('restore_disease');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Disease $disease): bool
    {
        return $user->can('force_delete_disease');
    }
}
