<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        $talias = new TableAlias; 
        return $this->belongsToMany(\App\User::class, 'user_roles');
    }

    /*Role type*/
    public function scopeCode($query, $code)
    {
        return $query->where('code', '=', $code);
    }
}
