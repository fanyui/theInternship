<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\City;
use App\Country;
use App\Address;

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

	public function searchDetails(Request $request, $company)
	{
		$company = Company::find($company);
		$address = $company->address()->first();
		$CompanyHasCategory = $company->CompanyHasCategory()->get();
		return view('search.searchdetails')->with('company', $company)
											->with('address', $address)
											->with('CompanyHasCategories', $CompanyHasCategory);
	}

	public function layouts(Request $request)
    {
        $countries = Country::get();
        return view('welcome')->with('countries', $countries);
    }
}
