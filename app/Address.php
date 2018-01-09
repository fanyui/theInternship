<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'telephone', 'email', 'country_id', 'state_id', 'city_id',
    ];

    public function company(){
    	return $this->belongsTo(\App\Company::class);
    }
    public function country(){
    	return $this->belongsTo(\App\Country::class);
    }
}
