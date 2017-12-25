<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationType extends Model
{
    public function media()
    {
    	return $this->belongsTo(\App\Media::class);
    	
    }
}
