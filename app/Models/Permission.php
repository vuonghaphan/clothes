<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = ['name', 'key_code', 'parent_id'];


    public function permissionsChildrents()
    {
        return $this->hasMany(Permission::class,'parent_id', 'id');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role', 'permission_id','role_id')->withTimestamps();
    }
}
