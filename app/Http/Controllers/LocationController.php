<?php

namespace App\Http\Controllers;
use App\State;
use App\Country;
use App\City;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class LocationController extends Controller
{
     public function index()
    {
    	
    }

    //Receive country id and send json data of state
    public function ajax_country_states(Request $Request)
    {
    	$country_id = Input::get('country_id');
    	$states = Country::find($country_id)->states;
    	
    	return $states;
    }

    //Receive state id and send json data of cities
    public function ajax_states_cities(Request $Request)
    {
    	$state_id = Input::get('state_id');
        $cities = State::find($state_id)->cities;
        return $cities;
    }
}
