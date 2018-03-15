<?php

namespace App\Http\Controllers;

use App\Company;
use App\State;
use App\City;
use App\Country;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    function sitemap(Request $request){
        
        $sitemap = App::make("sitemap");
        $cache_name  = 'InternshipSpace.sitemap';
        //set cache to expires after 1440 minutes which is == 24hrs 
        $sitemap->setCache($cache_name, 1440);

        //if cache does not exist, create one and cache else render the already cached one
       if (!$sitemap->isCached()){
            $companies = Company::get();   
            $countries = Country::get();
            $defaultImg  = array(array('url' =>  URL::to('/img/logo.jpg'), 'title'=>"internship Space"));

           
            $sitemap->add(URL::to(route('index')), Carbon::now(), '0.9', 'daily');
            $sitemap->add(URL::to(route('front')), Carbon::now(), '0.9', 'daily');
            $sitemap->add(URL::to(route('home')), Carbon::now(), '0.9', 'daily');
            $sitemap->add(URL::to(route('login')), Carbon::now(), '0.9', 'daily');
            $sitemap->add(URL::to(route('register')), Carbon::now(), '0.9', 'daily');
            $sitemap->add(URL::to(route('contact-us')), Carbon::now(), '0.9', 'daily');
            $sitemap->add(URL::to(route('create-company')), Carbon::now(), '0.9', 'daily');
            $sitemap->add(URL::to(route('companies')), Carbon::now(), '0.9', 'daily');

               
            foreach ($companies as $company) {
                $images = array();
                if(count($company->images) > 0){
                    foreach ($company->images as $image) {
                        $images[]= array('url'=> URL::to($image->img_path), 'title'=>$company->name);
                    }
                }
                $sitemap->add(URL::to(route('search-details',['slug'=>$company->id])), Carbon::now(), '1.0', 'daily', $images);
            }
      

            //adding search by country url to sitemap
            foreach ($countries as $country) {
                 $sitemap->add(URL::to(route('search').'?country='.$country->id), Carbon::now(), '0.7', 'yearly', $defaultImg);
        	}

    	}

    return   $sitemap->render('xml');
    }
}
