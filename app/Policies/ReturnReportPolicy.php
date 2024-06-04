<?php

namespace App\Policies;

use App\Models\ReturnReport;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReturnReportPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_return::report');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ReturnReport $returnReport): bool
    {
        return $user->can('view_return::report');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_return::report');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReturnReport $returnReport): bool
    {
        return $user->can('update_return::report');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReturnReport $returnReport): bool
    {
        return $user->can('delete_return::report');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ReturnReport $returnReport): bool
    {
        return $user->can('restore_return::report');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ReturnReport $returnReport): bool
    {
        return $user->can('force_delete_return::report');
    }
}
