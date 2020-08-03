<?php

namespace App\Policies;

use App\Models\Member;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
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
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('permission_list');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('permission_add');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('permission_edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('permission_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function restore(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Permission  $permission
     * @return mixed
     */
    public function forceDelete(Member $member)
    {
        //
    }
}
