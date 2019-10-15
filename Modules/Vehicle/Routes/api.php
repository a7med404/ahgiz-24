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

Route::middleware('auth:api')->get('/vehicle', function (Request $request) {
    return $request->user();
});

Route::post('getStation', 'API\ApiStationController@getStation');
route::get('plane-stations','API\ApiStationController@planestation');

