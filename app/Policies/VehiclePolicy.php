<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class VehiclePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public $role;

    public $module = 'vehicles';

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
    public function view(User $user, Vehicle $vehicle)
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
    public function restore(User $user, Vehicle $vehicle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vehicle $vehicle)
    {
        //
    }
}
