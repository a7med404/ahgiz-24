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

Route::middleware('auth:api')->get('/reservations', function (Request $request) {
    return $request->user();
});

// Route::get('myreserv/{id}', 'API\ApiReservationController@myReservations');
// Route::get('myreserv-details/{id}', 'API\ApiReservationController@myReservationDetails');
// Route::post('available-reserve', 'API\ApiReservationController@availableReservation');
// Route::post('cancel-reservation', 'API\ApiReservationController@cancelReservation');

Route::group(['namespace' => 'API', 'middleware' => 'auth:api', 'prefix' => 'reservations'], function () {

    Route::get('myreserv/{id}', 'ApiReservationController@myReservations');
    Route::get('myreserv-details/{id}', 'ApiReservationController@myReservationDetails');
    Route::post('available-reserve', 'ApiReservationController@availableReservation');
    Route::post('cancel-reservation', 'ApiReservationController@cancelReservation');
    // Route::resource('reservations', 'ApiReservationController');
});
