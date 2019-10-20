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

Route::group(['namespace' => 'API', 'middleware' => 'auth:api', 'prefix' => 'reservations'], function () {

    Route::get('my-reservations/{id}', 'ApiReservationController@myReservations')->name('customer-reservations');
    Route::get('my-reservation-details/{id}', 'ApiReservationController@myReservationDetails')->name('my-reservation-details');
    
    Route::post('cancel-reservation', 'ApiReservationController@cancelReservation')->name('cancele-reservation');

    Route::post('available-reservation', 'ApiReservationController@availableReservation');
    // Route::resource('reservations', 'ApiReservationController');
});
