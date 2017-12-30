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

Route::get('/', 'SearchController@layouts')->name('index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@search')->name('search');
Route::get('/search/details/{company}', 'SearchController@searchDetails')->name('search-details');

Route::post('/country/states', 'LocationController@ajax_country_states');
Route::post('/state/cities', 'LocationController@ajax_states_cities');

Route::get('/company/new', 'CompanyController@index');