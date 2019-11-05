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
    // Route::group(['namespace' => 'API', 'prefix' => 'reservations'], function () {

    Route::get('my-reservations/{id}', 'ApiReservationController@myReservations')->name('customer-reservations');
    Route::get('my-reservation-details/{id}', 'ApiReservationController@myReservationDetails')->name('my-reservation-details');
    
    Route::post('cancel-reservation', 'ApiReservationController@cancelReservation')->name('cancele-reservation');

    Route::post('search-reservation', 'ApiReservationController@availableReservation')->name('search-reservation');
    Route::post('reserve-step-one/{tripId}', 'ApiReservationController@reserveStepOne')->name('reserve-step-one');
    Route::get('reserve-step-two/{id}', 'ApiReservationController@reserveSteptow')->name('reserve-step-two');

    // Route::resource('reservations', 'ApiReservationController');
});
