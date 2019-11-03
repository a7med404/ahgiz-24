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

Route::group(['namespace' => 'API', 'middleware' => 'auth:api', 'prefix' => 'vehicles'], function () {

    Route::get('get-bus-stations', 'ApiStationController@getBusStation')->name('get-bus-stations');
    route::get('get-plane-stations', 'ApiStationController@getPlaneStation');

});
