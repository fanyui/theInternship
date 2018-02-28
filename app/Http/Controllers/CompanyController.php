<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use DB;

use App\Image;
use App\Country;
use App\Custom\Custom;
use App\Address;
use App\Company;
use App\Media;
use App\Category;
use App\ApplicationType;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;

use Mapper;
class CompanyController extends Controller
{
     public $roles; 
     
    //protected all functions of this controller with the auth middleware
    // id all users acessing methods of this class should be loggedin
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->roles = Custom::getUserRoles(Auth::user());
        view()->share('__roles__', $this->roles);
    }


    public function index(){
            //only admins are allowed to create companies
          if (!in_array('admin', Custom::getUserRoles(Auth::user()))) {
            throw new \Illuminate\Auth\Access\AuthorizationException; 
        }
Mapper::map(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDragEnd' => 'document.getElementById("latitude").value = event.latLng.lat(); document.getElementById("longitude").value =event.latLng.lng();']);
    	$countries = Country::get();
        $categories = Category::get();
    	 return view('new-company-wizard.new-company')->with('countries', $countries)
                                                        ->with('categories', $categories);
    	 
    }

   

    //create a new company 
    public function new(Request $request)
    {

        $this->validate($request, [
            'telephone' => 'required|integer',
            'email' => 'required|email',
            'country' => 'required|integer',
            'state' => 'required|integer',
            'city' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'website' => 'url',
            'duration' => 'integer',
            'application_period' => 'string',
            'application_end_period' => 'string', 
            'intern_number' => 'integer',
            'longitude' => 'numeric',
            'latitude' => 'numeric',
            'internship_reward' => 'string',
            'category' => 'required|integer',
            'images.*'       => 'image',
            'logo'      => 'image|required',

        ]);


        // $company = new Company();
         $logo = asset('logo.jpg');//set the default logo to internshipspace logo but ovewrite if given



        

        // $company->name = $request->name;
        // $company->description = $request->description;
        // $company->duration = $request->duration;
        // $company->website = $request->website;
        // $company->application_period = $request->application_period;
        // $company->application_end_period = $request->application_end_period;
        // $company->intern_number = $request->intern_number;
        // $company->longitude = $request->longitude;
        // $company->latitude = $request->latitude;
        // // $company->address_id = $address->id; 
        // $company->category_id = $request->category;
        // $company->internship_reward = $request->intenship_reward;
        // //upload the logo and extract the name
        if(isset($request->logo) ){
            $logo =  Custom::fileUpload($request->logo, 'uploads/company/logo', null, null);
        }

        // $company->save();
$data = DB::transaction(function () use ($request, $logo){
        $company = Company::create([
            'name' => $request->name,
            'description'=> $request->description,
            'duration'  => $request->duration,
            'website'   => $request->website,
            'application_period' => $request->application_period,
            'application_end_period' => $request->application_end_period,
            'intern_number' => $request->intern_number,
            'longitude'     => $request->longitude,
            'latitude'      => $request->latitude,
            'category_id'   =>$request->category,
            'internship_reward' => $request->intenship_reward,
            'logo'  => $logo,
        ]);
        return $company->id;
    });
        // $company_id = Company::orderBy('id', 'dsc')->first();
        $address = new Address();
        $address->telephone = $request->telephone;
        $address->email     = $request->email;
        $address->country_id = $request->country;
        $address->state_id = $request->state;
        $address->city_id = $request->city;
        $address->company_id = $data;

        $address->save();

        // $address = Address::create([
        //             'telephone'     => $request->telephone,
        //             'email'    => $request->email,
        //             'country_id' => $request->country,
        //             'state_id' => $request->state,
        //             'city_id' => $request->city,
        //             'company_id' => $data,
        //         ]);



        if(isset($request->images[0])){
        /*5. Upload images and add them to company images*/
            $imageData = array(); 
            foreach ($request->images as $imageObj) {
                $filename = Custom::fileUpload($imageObj, 'uploads/company/images', null, config('settings.img_resize'));
                $imageData[] = array('company_id' => $data, 'name' => $filename, 'created_at' => Carbon::now());
            }
            $listingImages = Image::insert($imageData);
        }

        $request->session()->flash('alert-success', 'Company Successfully created see details below');
        return redirect(route('search-details',['slug' => $data]));

    }

    //renders the form to create an application to a company after login
    public function media(Request $request, $company_id)
    {
        $company = Company::find($company_id);
    	$application_type = ApplicationType::get();
    	return view('mediaForm')->with('application_type', $application_type)->with('company', $company );
    }
    //save the media object for the form above to a particular company you are applying for
    public function storeMedia(Request $request)
    {


        $this->validate($request,[
            'application_letter' => 'required',
            'cv'                =>  'required',
            'company_id'        =>  'required|integer',
            // 'multivation_letter'=>  'required',
            'application_type'  =>  'required',
        ]);

    	$media = new Media();
    	$media->company_id = $request->company_id;
    	$media->application_type = $request->application_type;
    	$media->user_id = Auth::user()->id;

    	$media->multivation_letter = $request->multivation_letter;
    	$media->application_letter_text = $request->application_letter_text;

    	//extract the name and save in the dbase while sending the files to uploads folder
    	// $media->cv = Custom::fileUpload($request->file('cv'), 'uploads/company', null,  config('settings.img_resize'));
    	$media->cv = Custom::uploadCV($request->cv, 'uploads/company/letters', null);
        //application letter upload
    	$media->application_letter =Custom::uploadCV($request->application_letter, 'uploads/company/letters', null); 

    	$media->save();

        /*Send Email*/ 
        $company = Company::find($request->company_id)->first();
        $mailContent = [   'title' => 'Contact Us', 
                            'subject'=>'Application For Internship',
                            'body' =>   '<strong>' . Auth::user()->name . '</strong><br />' .
                                         'Wants to submit an application to the company<br />' .
                                        $company->name . '<br />' .
                                     ' With the following files as attachments<br />',
                            'url' => "route('search-details',['slug'=>$company->id])",
                        ];
        Mail::to(config('settings.system.email'))->send(new EmailNotification($mailContent, asset('upload/company/letters'.$media->cv)));

         $request->session()->flash('alert-success', 'Documents Successfully Sent!');

         return back();
    }
}
