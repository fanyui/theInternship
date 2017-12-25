<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function user()
    {
    	return $this->belongsTo(\App\User::class);
    }
    public function company()
    {
    	return $this->belongsTo(\App\Company::class);
    }
}
