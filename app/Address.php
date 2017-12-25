<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function company(){
    	return $this->belongTo(\App\Company::class);
    }
}
