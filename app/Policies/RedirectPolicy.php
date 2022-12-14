<?php

namespace App\Policies;

use App\Models\Redirect;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RedirectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Redirect $redirect
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Redirect $redirect)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isEditor();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Redirect $redirect
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Redirect $redirect)
    {
        return $user->isOwner();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Redirect $redirect
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Redirect $redirect)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Redirect $redirect
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Redirect $redirect)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Redirect $redirect
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Redirect $redirect)
    {
        return false;
    }
}
