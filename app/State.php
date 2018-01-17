<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function country()
    {
    	return $this->belongsTo(\App\Country::class);
    }

    public function cities()
    {
    	return $this->hasMany(\App\City::class);
    }
}
