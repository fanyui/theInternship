<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

	public function getImgPathAttribute($value=''){
        return $this->img_path = 'uploads/company/images/' . $this->name;
    }

    public function getHeaderImgAttribute($value=''){
        return $this->header_img = config('settings.img_resize.header.p') .'/' . $this->name;
    }
    public function getThumbnailImgAttribute($value=''){
        return $this->thumbnail_img = config('settings.img_resize.thumbnail.p') .'/' . $this->name;
    }
    // public function getFeaturedImgAttribute($value=''){
    //     return $this->featured_img = config('settings.img_resize.featured.p') .'/' . $this->image;
    // }
    public function company()
    {
    	return $this->belongsTo(\App\Company::class);
    }
}
