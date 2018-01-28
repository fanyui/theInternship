<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\City;
use App\Country;
use App\Address;

use App\Contact;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;

use Mapper;

class SearchController extends Controller
{
	public function search(Request $request)
	{
        $countries = Country::get();
		$company =null;

        // 

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
       
        return view('search.result')->with('countries', $countries)
                                    ->with('companies',$company->get());
		return $company->get();
	}
// old search details page
	public function searchDetailsOld(Request $request, $company)
	{

		//Mapper::marker(53.381128999999990000, -1.470085000000040000, ['draggable' => true, 'eventDragEnd' => 'console.log(event.latLng.lat()); console.log(event.latLng.lng());']);

		$company = Company::find($company);
		$address = $company->address()->first();
		$CompanyHasCategory = $company->CompanyHasCategory()->get();
		return view('search.searchdetailsold')->with('company', $company)
											->with('address', $address)
											->with('CompanyHasCategories', $CompanyHasCategory);
	}


	public function layouts(Request $request)
    {
        $countries = Country::get();
        return view('welcome')->with('countries', $countries);
    }

    public function searchDetails(Request $request, $company)
    {
         $countries = Country::get();
         $company = Company::find($company);
        $address = $company->address()->first();
        $category = $company->category()->get();
        Mapper::map($company->latitude, $company->longitude, ['draggable' => true, 'eventDragEnd' => 'console.log(event.latLng.lat()); console.log(event.latLng.lng());']);

		return view('search-details')->with('countries', $countries)
								->with('company', $company)
								->with('address', $address)
								->with('categories', $category);
    }


    public function contactUs(Request $request)
    {
    	return view('contact-us');
    }

     public function contactUsForm(Request $request) {
        $this->validate($request, [
            'author' => 'required|string',
            'email' => 'required|email',
            'subject' => 'string',
            'comment' => 'string',
        ]);

        $contact = new Contact;
        $contact->author = $request->author;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->comment = $request->comment;

        $contact->save();

        /*Send Email*/ 
        $mailContent = [   'title' => 'Contact Us', 
                            'body' =>   $contact->author. $contact->comment ,
                                        
                            'subject' => $contact->subject,
                                        
                            'url' => "internshipspace.com",
                            'email' => $contact->email,
                        ];

        Mail::to(config('settings.system.email'))->send(new EmailNotification($mailContent, null));

        $request->session()->flash('alert-success', 'Message Successfully Sent!');
        return view('contact-us');
    }
}
