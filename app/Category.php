<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 //    public function CompanyHasCategory()
	// {
	// 	return $this->hasMany(\App\CompanyHasCategory::class);
	// }
	public static function company()
	{
		return $this->hasMany(\App\Company::class, 'category_id');
	}
}
