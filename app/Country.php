<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	public function states()
 	{
  		return $this->hasMany(\App\State::class);
 	}
 	public function company()
 	{
 		return $this->hasMany(\App\Company::class);
 	}
}
