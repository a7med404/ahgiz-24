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

Route::middleware('auth:api')->get('/website', function (Request $request) {
    return $request->user();
});
Route::get('/search-post', 'API\ApiWebsiteController@searchPost')->name('search-post');
Route::get('/bus-details/{id}', 'API\ApiWebsiteController@busDetails')->name('bus-details');
