<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CompanyController extends Controller
{
    public function index(){
    	$countries = Country::get();
    	 return view('new-company-wizard.new-company')->with('countries', $countries);
    	 
    }
}
