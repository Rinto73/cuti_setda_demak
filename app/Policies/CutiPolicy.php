<?php

namespace App\Policies;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CutiPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Cuti $cuti): bool
    {
        return $user->id === $cuti->user_id || $user->role === 'admin'; // Sesuaikan logika role kamu
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'user' || $user->role === 'admin';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Cuti $cuti): bool
    {
        return $user->is($cuti->user) || $user->role === 'admin';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Cuti $cuti): bool
    {
        return $user->is($cuti->user) || $user->role === 'admin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Cuti $cuti): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Cuti $cuti): bool
    {
        return false;
    }
}
