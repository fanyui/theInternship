<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 //    public function CompanyHasCategory()
	// {
	// 	return $this->hasMany(\App\CompanyHasCategory::class);
	// }
	public function company()
	{
		return $this->hasOne(App\Company::class, 'category_id');
	}
}
