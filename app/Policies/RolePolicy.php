<?php

namespace App\Policies;

use App\Models\Member;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function viewAny(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('role_list');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('role_add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('role_edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('role_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Role  $role
     * @return mixed
     */
    public function restore(Member $member, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Role  $role
     * @return mixed
     */
    public function forceDelete(Member $member, Role $role)
    {
        //
    }
}
