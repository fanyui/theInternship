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

//handle search by using key word typed in by user
Route::get('/company', 'ApiSearchController@search');

//handle search by using built in category field when user clicks featured company
//eg. IT, medicine, agriculture, etc
Route::get('/searchTerm', 'ApiSearchController@featuredSearch');

//handles the details of a company search
Route::get('/search/details/{company}', 'ApiSearchController@searchDetails');

