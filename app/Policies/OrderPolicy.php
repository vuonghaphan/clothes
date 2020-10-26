<?php

namespace App\Policies;

use App\Models\Member;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function detail(Member $member)
    {
        return $member->checkPermissionAccess('order_detail');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Order  $order
     * @return mixed
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('order_list');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function create(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Order  $order
     * @return mixed
     */
    public function update(Member $member)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Order  $order
     * @return mixed
     */
    public function cancel(Member $member)
    {
        return $member->checkPermissionAccess('order_cancel');
    }

    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('order_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Order  $order
     * @return mixed
     */
    public function restore(Member $member, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Order  $order
     * @return mixed
     */
    public function forceDelete(Member $member, Order $order)
    {
        //
    }
}
