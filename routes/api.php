<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search', 'ApiSearchController@search');
Route::get('/search/details/{company}', 'ApiSearchController@searchDetails');

//these are responsible for the auto updating of the states when country is selected and cities when state is selected.
Route::post('/country/states', 'ApiLocationController@ajax_country_states');
Route::post('/state/cities', 'ApiLocationController@ajax_states_cities');
