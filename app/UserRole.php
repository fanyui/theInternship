<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $fillable = [
        'user_id', 'role_id', 
    ];

    public function user()
    {
    	return $this->belongsTo(\App\User::class, 'user_id'); 
    }

    /* User role relationships */
    public function user_role()
    {
        return $this->hasMany(\App\model\UserRole::class, 'user_id');
    }


    public function role()
    {
    	return $this->belongsTo(\App\model\Role::class, 'role_id');
    }
}
