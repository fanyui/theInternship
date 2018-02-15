<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Company;
use App\City;
use App\Country;
use App\Address;
use App\Custom\Custom;
use App\Contact;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Mail;

use Mapper;
use SEOMeta;
use OpenGraph;
use Twitter;
use Lang;

class SearchController extends Controller
{
	public function search(Request $request)
	{
        $countries = Country::get();
		$company =null;

        // 

        $companyResult = Custom::customSearch($request, $countries);
       
        return view('search.result')->with('countries', $countries)
                                    ->with('companies',$companyResult->paginate(10));
		return $companyResult->get();
	}

     public function companies(Request $request)
    {
        $countries = Country::get();
        $count = count(Company::get());
       $companies = Company::paginate(10);
       return view('companies')->with('countries', $countries)->with('companies',$companies)->with('count',$count);
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
        
        SEOMeta::setTitle( Lang::get('sentence.seo_title'));
        SEOMeta::setDescription(Lang::get('sentence.seo_description'));
        SEOMeta::addKeyword([Lang::get('sentence.seo_keyword')]);
        SEOMeta::addMeta('viewport', 'width=device-width, initial-scale=1');
        SEOMeta::addMeta('copyright', Lang::get('sentence.seo_copyright'));

        SEOMeta::addMeta('DC.title', Lang::get('sentence.meta_title'));
        SEOMeta::addMeta('utf-8', '', 'charset');
        SEOMeta::addMeta('X-UA-Compatible', 'IE=edge','http-equiv');
        SEOMeta::addMeta('image', asset('img/banner.jpg'));
        SEOMeta::addMeta('og:image',asset('img/banner.jpg'));

            //opengraph tags
        OpenGraph::setDescription(Lang::get('sentence.seo_description'));
        OpenGraph::setUrl(env('APP_URL'));
        OpenGraph::setTitle(Lang::get('sentence.opengraph_title'));



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
