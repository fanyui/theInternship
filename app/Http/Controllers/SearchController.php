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

class SearchController extends Controller
{
	public function search(Request $request)
	{
		$company = Company::get();
		// $company = Company::where('country_id', $request->country)->where('state_id', $request->state);

		/*Todo 
		* if country is not specified in the search string use the default browser location
		*/
		return view('search.result')->with('companies',$company);
		return $company;
	}
// old search details page
	public function searchDetailsOld(Request $request, $company)
	{
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
		$CompanyHasCategory = $company->CompanyHasCategory()->get();

		return view('search-details')->with('countries', $countries)
								->with('company', $company)
								->with('address', $address)
								->with('CompanyHasCategories', $CompanyHasCategory);
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
        $request->session()->flash('alert-success', 'Message Successfully Sent!');

        /*Send Email*/ 
        $mailContent = [   'title' => 'Contact Us', 
                            'body' =>   '<strong>' . $contact->author . '</strong><br />' .
                                        $contact->email . '<br />' .
                                        $contact->subject . '<br />' .
                                        $contact->comment . '<br />',
                            'url' => "",
                            'email' => $contact->email,
                        ];

        Mail::to(config('settings.system.email'))->send(new EmailNotification($mailContent));

        return view('contact-us');
    }
}
