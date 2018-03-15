<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'SearchController@layouts')->name('index');
Auth::routes();



Route::get('/sitemap.xml', 'SitemapController@sitemap')->name('sitemap');



// Route::group([
// 		'prefix' => '{locale}'], function () {

// 			Route::get('/home', 'HomeController@index')->name('home');

			Route::get('/search', 'SearchController@search')->name('search');
			Route::get('/search/details/{company}', 'SearchController@searchDetails')->name('search-details');
			Route::get('/companies', 'SearchController@companies')->name('companies');

			// formally 
			// Route::get('/search/details/{company}', 'SearchController@front')->name('search-details');

			Route::post('/country/states', 'LocationController@ajax_country_states');
			Route::post('/state/cities', 'LocationController@ajax_states_cities');

			Route::get('/company/new', 'CompanyController@index')->name('create-company');
			Route::post('/company/new', 'CompanyController@new')->name('company-new');

			Route::get('/media/{company_id}/new', 'CompanyController@media')->name('media');
			Route::post('/media/store', 'CompanyController@storeMedia')->name('store-media');


			Route::get('/front', 'SearchController@front')->name('front');

			Route::get('/contact-us', 'SearchController@contactUs')->name('contact-us');
			Route::post('/contact-us', 'SearchController@contactUsForm')->name('submit-contactus');
// });