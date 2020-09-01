<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static find(int $id)
 */
class Member extends Authenticatable
{
    protected $table = 'members';

    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    protected $hidden = ['password'];

    public function roles(){
        return $this->belongsToMany(Role::class, 'member_role','member_id', 'role_id')->withTimestamps();
    }

    public function checkPermissionAccess($permissionCheck){
        $roles = auth()->User()->roles;
        if (auth()->id() == 1) {
            return true;
        }
        foreach ($roles as $role) {
            $permission = $role->permissions;
            if ($permission->contains('key_code', $permissionCheck)) {
                return true;
            }
        }
        return false;
    }
}
