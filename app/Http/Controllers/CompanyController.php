<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Country;
use App\Custom\Custom;
use App\Address;
use App\Company;
use App\Media;
use App\Category;

class CompanyController extends Controller
{
    public function index(){
    	$countries = Country::get();
        $categories = Category::get();
    	 return view('new-company-wizard.new-company')->with('countries', $countries)
                                                        ->with('categories', $categories);
    	 
    }

    //create a new company 
    public function new(Request $request)
    {

        $company = new Company();
        // $address = new Address();
        // $address->email = $request->email;
        // $address->telephone = $request->telephone;
        // $address->country = $request->country;
        // $address->state = $request->state;
        // $address->city =$request->city;



        

        $company->name = $request->name;
        $company->description = $request->description;
        $company->duration = $request->duration;
        $company->website = $request->website;
        $company->application_period = $request->application_period;
        $company->intern_number = $request->intern_number;
        $company->longitude = $request->longitude;
        $company->latitude = $request->latitude;
        // $company->address_id = $address->id; 
        $company->category_id = $request->category;
        $company->internship_reward = $request->internship_reward;
        //upload the logo and extract the name
        if(isset($request->logo) ){
            $company->logo =  Custom::fileUpload($request->logo, 'uploads/company/logo', null, null);
        }
        if(isset($request->images[0])){
            $company->image = Custom::fileUpload($request->images, 'uploads/company', null, config('settings.img_resize'));
        }

        $company->save();


		$address = Address::create([
		            'telephone'     => $request->telephone,
		            'email'    => $request->email,
                    'country_id' => $request->country,
		            'state_id' => $request->state,
		            'city_id' => $request->city,
                    'company_id' => $company->id,
		        ]);
    }

    //renders the form to create an application to a company after login
    public function media(Request $request)
    {
    	$application_type = null;
    	return view('mediaForm')->with('application_type', $application_type)->with('company_id', 1);
    }
    //save the media object for the form above to a particular company you are applying for
    public function storeMedia(Request $request)
    {
    	$media = new Media();
    	$media->company_id = $request->company_id;
    	$media->application_type = 1;
    	$media->user_id = Auth::user()->id;

    	$media->multivation_letter = $request->multivation_letter;
    	$media->application_letter_text = $request->application_letter_text;

    	//extract the name and save in the dbase while sending the files to uploads folder
    	// $media->cv = Custom::fileUpload($request->file('cv'), 'uploads/company', null,  config('settings.img_resize'));
    	$media->cv = Custom::uploadCV($request->cv, 'uploads/company/letters', null);
        //application letter upload
    	$media->application_letter =Custom::uploadCV($request->application_letter, 'uploads/company/letters', null); 

    	$media->save();
    }
}
