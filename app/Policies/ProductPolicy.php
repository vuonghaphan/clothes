<?php

namespace App\Policies;

use App\Models\Member;
use App\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
     * @param  \App\Product  $product
     * @return mixed
     */
    public function view(Member $member)
    {
        return $member->checkPermissionAccess('product_list');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Member  $member
     * @return mixed
     */
    public function create(Member $member)
    {
        return $member->checkPermissionAccess('product_add');

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Product  $product
     * @return mixed
     */
    public function update(Member $member)
    {
        return $member->checkPermissionAccess('product_edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Product  $product
     * @return mixed
     */
    public function delete(Member $member)
    {
        return $member->checkPermissionAccess('product_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Product  $product
     * @return mixed
     */
    public function restore(Member $member, Product $product)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Member  $member
     * @param  \App\Product  $product
     * @return mixed
     */
    public function forceDelete(Member $member, Product $product)
    {
        //
    }
}
