<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Models\ForgotPassword;

class ForgotPasswordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_forgot::password');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ForgotPassword $model): bool
    {
        return $user->can('view_forgot::password');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_forgot::password');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ForgotPassword $model): bool
    {
        return $user->can('update_forgot::password');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ForgotPassword $model): bool
    {
        return $user->can('delete_forgot::password');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ForgotPassword $model): bool
    {
        return $user->can('restore_forgot::password');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ForgotPassword $model): bool
    {
        return $user->can('force_delete_forgot::password');
    }
}
