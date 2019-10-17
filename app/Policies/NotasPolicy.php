<?php

namespace App\Policies;

use App\Models\Notas;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any notas.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the notas.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Notas  $notas
     * @return mixed
     */
    public function view(User $user, Notas $notas)
    {
        return true;
    }

    /**
     * Determine whether the user can create notas.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasRole('admin') || $user->can('notas.add')) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the notas.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Notas  $notas
     * @return mixed
     */
    public function update(User $user, Notas $notas)
    {
        if ($user->hasRole('admin') || $user->can('notas.edit') || $notas->user_id === auth()->user()->id) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the notas.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Notas  $notas
     * @return mixed
     */
    public function delete(User $user, Notas $notas)
    {
        if ($user->hasRole('admin') || $user->can('notas.delete') || $notas->user_id === auth()->user()->id) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the notas.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Notas  $notas
     * @return mixed
     */
    public function restore(User $user, Notas $notas)
    {
        if ($user->hasRole('admin') || $user->can('notas.add') || $notas->user_id === auth()->user()->id) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the notas.
     *
     * @param  \App\Models\User  $user
     * @param  \App\App\Models\Notas  $notas
     * @return mixed
     */
    public function forceDelete(User $user, Notas $notas)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }
}
