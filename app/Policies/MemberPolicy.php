<?php

namespace App\Policies;

// use App\Member;
use App\Models\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
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
     * @param  \App\Member  $member
     * @return mixed
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('member_list');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('member_add');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Member  $member
     * @return mixed
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('member_edit');

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Member  $member
     * @return mixed
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('member_delete');

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Member  $member
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
     * @param  \App\Member  $member
     * @return mixed
     */
    public function forceDelete(Member $member)
    {
        //
    }
}
