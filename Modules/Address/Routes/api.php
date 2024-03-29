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

Route::middleware('auth:api')->get('/address', function (Request $request) {
    return $request->user();
});


Route::prefix('address')->group(function() {
    Route::get('/loacls/{id}', 'AddressController@getLocals');
});
// Route::group(['prefix' => 'addresses'], function () {
// Route::group(['namespace' => 'API', 'middleware' => 'auth:api', 'prefix' => 'addresses'], function () {
    Route::group(['namespace' => 'API', 'prefix' => 'addresses'], function () {

    Route::resource('addresses','AddressController');
    Route::resource('contacts','ContactController');
    Route::resource('identifcations','IdentifcationController');
    
    Route::get('cities/all', 'ApiCityController@cities');
    Route::post('get-delegate', 'ApiAddressController@getDelegate');

});


    // show the cities //
    Route::get('/cities','API\ApicityController@cities');

    // show the cities child //
    route::get('cities/{id}','API\ApicityController@getcities');
