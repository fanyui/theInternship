<?php

namespace App\Custom;

use Auth;
use Image; 


use Carbon\Carbon; 

/**
* custom php function to do specific task defined by us
*/
class Custom
{
	
	function __construct(argument)
	{
		# code...
	}
	public static function uploadCV($fileObj,$path, $fname=null){
		$basePath = public_path($path);
		$ext = $fileObj->getClientOriginalExtension();
		$fileName = $fname ? $fname : md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true)) . '.' . $ext ;
		$fileObj->move($basePath, $fileName);
        $filePath = $basePath . '/' . $fileName;
        return $fileName;
	}

	public static function fileUpload($fileObj, $path, $fname=null, $resizeArray = null)
    {
        $basePath = public_path($path);
        $ext = $fileObj->getClientOriginalExtension();
        $fileName = $fname ? $fname : md5(uniqid(empty($_SERVER['SERVER_ADDR']) ? '' : $_SERVER['SERVER_ADDR'], true)) . '.' . $ext ;

        $imageOptimizer = new \Approached\LaravelImageOptimizer\ImageOptimizer ; 
        $imageOptimizer->optimizeUploadedImageFile($fileObj);

        $fileObj->move($basePath, $fileName);
        $filePath = $basePath . '/' . $fileName;
        $cmd = 'mogrify -quality 30 '.$filePath;
        exec($cmd);
        /*
        $resizeArray = array(
            'header'    => array('p' => 'uploads/listing/header', 'w' => 1350, 'h' => 265),
            'thumbnail' => array('p' => 'uploads/listing/thumbnail', 'w' => 370, 'h' => 220),
            'featured'  => array('p' => 'uploads/listing/featured', 'w' => 360, 'h' => 240)
        );
        */

        if (is_array($resizeArray)) {
            foreach ($resizeArray as $elt) {
                $imageRealPath = $basePath . '/' . $fileName; 
                $imageResizedPath = public_path($elt['p'] . '/' . $fileName); 
                $width = $elt['w']; 
                $height = $elt['h']; 


                /*
                $img = Image::make($imageRealPath);
                $img->fit($width, $height, function ($constraint) {
                */
                /**/
                $img = Image::make($imageRealPath)->fit($width, $height, function ($constraint) {
                    $constraint->upsize();
                });

                $img->save($imageResizedPath);
                /*
                convert *.JPG -resize 1350x265 -set filename:f '%t' header/'%[filename:f].JPG'; convert *.jpg -resize 1350x265 -set filename:f '%t' header/'%[filename:f].jpg'; convert *.JPG -resize 370x220 -set filename:f '%t' thumbnail/'%[filename:f].JPG'; convert *.jpg -resize 370x220 -set filename:f '%t' thumbnail/'%[filename:f].jpg'; convert *.JPG -resize 360x240 -set filename:f '%t' featured/'%[filename:f].JPG'; convert *.jpg -resize 360x240 -set filename:f '%t' featured/'%[filename:f].jpg';
                */

            }
        }

        return $fileName; 
    }
}