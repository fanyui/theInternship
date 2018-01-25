<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function company()
    {
    	return $this->belongsTo(\App\Company::class);
    }
}
