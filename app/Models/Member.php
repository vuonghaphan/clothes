<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    protected $table = 'members';

    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    protected $hidden = ['password'];

    public function Roles(){
        return $this->belongsToMany(Role::class, 'member_role','member_id', 'role_id')->withTimestamps();
    }
}
