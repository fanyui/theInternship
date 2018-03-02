<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\City;
use App\Country;
use App\Address;
use App\Custom\Custom;
use App\Category;


class ApiSearchController extends Controller
{
	//search to be applied to search  bar
    public function search(Request $request)
    {
    	$countries = Country::get();
		$company =null;

        // 
		$companyResult = Custom::customSearch( $request, $countries);
        
       return $companyResult->get();
    }

    //search api to be applied to featured search when a user clicks on a card
    public function featuredSearch(Request $request)
    {
    	$searchTerm = $request->get('searchTerm');

         return 	Company::whereHas('category',function($q) use ($searchTerm){
                            $q->Where('field', $searchTerm);
                        })->get();
    }

    public function fullDetails(Request $request, $id)
    {
        //get the details needed to display a particular company in full

        $countries = Country::get();
         $company = Company::find($id);
        $address = $company->address()->first();
        $category = $company->category()->get();

        $images = array();
        foreach($company->images as $image){
            
                      $images[] =  asset($image->thumbnail_img);  
                       
        }
             

       

        return response()->json(array('countries'=>$countries, 'address'=>$address, 'category'=>$category, 'images'=>$images)); 
    }
}
