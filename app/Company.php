<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	public function address(){
		return $this->hasOne(\App\Address::class);
	}   
	// public function CompanyHasCategory()
	// {
	// 	return $this->hasMany(\App\CompanyHasCategory::class);
	// }
	public function media()
	{
		return $this->hasMany(\App\Media::class,'company_id');
	}
	public function category()
	{
		return  $this->belongsTo(\App\Category::class);
	}
	public function images()
	{
		return $this->hasMany(\App\Image::class,'company_id');
	}
}
