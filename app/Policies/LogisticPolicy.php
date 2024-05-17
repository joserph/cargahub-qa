<?php

namespace App\Policies;

use App\Models\Logistic;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LogisticPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_logistic');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, logistic $logistic): bool
    {
        return $user->can('view_logistic');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_logistic');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, logistic $logistic): bool
    {
        return $user->can('update_logistic');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, logistic $logistic): bool
    {
        return $user->can('delete_logistic');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, logistic $logistic): bool
    {
        return $user->can('restore_logistic');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, logistic $logistic): bool
    {
        return $user->can('force_delete_logistic');
    }
}
