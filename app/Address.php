<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function company(){
    	return $this->belongsTo(\App\Company::class);
    }
    public function country(){
    	return $this->belongsTo(\App\Country::class);
    }
}
