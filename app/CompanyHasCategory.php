<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyHasCategory extends Model
{
   public function companies()
   {
   	return $this->belongsTo(\App\Company::class);
   }
   public function category()
   {
   	return $this->belongsTo(\App\Category::class);
   }
}
