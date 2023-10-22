<?php

namespace App\Policies;

use App\Models\Destination;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class DestinationPolicy
{
    public $role;

    public $module = 'destinations';

    public function __construct()
    {
        $this->role = json_decode(Auth::user()->group->permissions, true);
    }

    public function viewAny()
    {
        return isRole($this->role, $this->module, 'view');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Destination $destination)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return isRole($this->role, $this->module, 'add');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update()
    {
        return isRole($this->role, $this->module, 'edit');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete()
    {
        return isRole($this->role, $this->module, 'delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Destination $destination)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Destination $destination)
    {
        //
    }
}
