<?php

namespace App\Custom;

use Auth;
use Image; 
use Illuminate\Http\Request;

use Carbon\Carbon; 
use App\Company;

/**
* custom php function to do specific task defined by us
*/
class Custom
{
	
	function __construct()
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

    public static function customSearch(Request $request)
    {
         /************************************************
        **when company and state are provided  checking **
        **    only for state because if it haas state   **
        **    then country must have been selected      **
        **                                              **
        *************************************************/
        if($request->get('country')!=null && $request->get('state')!=null && $request->get('city')==null){     
            $company = Company::whereHas('address',function($q) use ($request){
                            $q->where('country_id', $request->get('country'))
                                ->where('state_id', $request->get('state'));
                            });
            
        }


         /************************************************
        **                                              **
        **                                              **
        **    when country  only is provided            **
        **                                              **
        *************************************************/
        if($request->get('country')!=null && $request->get('state')==null && $request->get('city') ==null){
            $company = Company::whereHas('address',function($q) use ($request){
                        $q->where('country_id', $request->get('country'));
                        });
            
        }

        /************************************************
        **                                              **
        **                                              **
        **     When all the three are present           **
        **                                              **
        *************************************************/
        if($request->get('country')!=null && $request->get('state') !=null && $request->get('city') !=null){
            $company = Company::whereHas('address',function($q) use ($request){
                            $q->where('country_id', $request->get('country'))
                                ->where('state_id', $request->get('state'))
                                ->where('city_id', $request->get('city'));
                            });
        }

        /************************************************
        **                                              **
        **                                              **
        **     When nothing has been provided           **
        **    ie. only search string provided           **
        **   get all the companies and use the search   **
        **    string to find the match                  **
        *************************************************/


        if($request->get('country')==null && $request->get('state')==null && $request->get('city')==null){
            $company = Company::whereHas('address',function($q) use ($request){
                            $q->where('country_id', 1);
            });
            // $company = Company::all();using default country as cameroon with id 1 to provide consistency in the way querying is done
            // Todo will use location of user to customize his or her search with time
        }


        //this splites the search strings in to tokens so we can search each one agains the database
        if($request->get('search')!=null){
                $search = array();
             $tokens = preg_split("/[\r\n\t ]+/", $request->get('search') );
             foreach ($tokens as $key => $value) {
                if(strlen($value) <= 4 )
                    continue;
            //filter all string of length greater or equal four and use agains database search to avoid searching words like is to the if should in case the user provided them
                array_push($search, $value);
             }
             
            $company = $company->whereHas('category', function($q) use ($request, $search){
                for ($i=0; $i < count($search); $i++)
                    $q->orWhere('name', 'like', '%'.$search[$i].'%')
                ;
            });

        }
            //if no search string is provided just return the companies accumulated so far
        if($request->get('search')== null){
            $company =$company;
        }
        
        /*Todo 
        * if country is not specified in the search string use the default browser location
        */

        return $company;
    }
}