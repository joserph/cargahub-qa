<?php

namespace App\Policies;

use App\Models\ReturnReportItem;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReturnReportItemPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_return::report::item');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ReturnReportItem $returnReportItem): bool
    {
        return $user->can('view_return::report::item');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_return::report::item');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReturnReportItem $returnReportItem): bool
    {
        return $user->can('update_return::report::item');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReturnReportItem $returnReportItem): bool
    {
        return $user->can('delete_return::report::item');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ReturnReportItem $returnReportItem): bool
    {
        return $user->can('restore_return::report::item');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ReturnReportItem $returnReportItem): bool
    {
        return $user->can('force_delete_return::report::item');
    }
}
