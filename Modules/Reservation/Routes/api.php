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
    
    Route::post('cancel-reservation', 'ApiReservationController@cancelReservation')->name('cancel-reservation');

    Route::post('search-reservation', 'ApiReservationController@availableReservation')->name('search-reservation');
    Route::post('reserve-step-one/{tripId}', 'ApiReservationController@reserveStepOne')->name('reserve-step-one');
    Route::get('reserve-step-two/{id}/pay-method/{payMethod}', 'ApiReservationController@reserveSteptow')->name('reserve-step-two');
   
    Route::get('reserve-step-three/{number}', 'ApiReservationController@markAsPaid')->name('reserve-step-three');



    Route::post('add-plane-reservation', 'ApiPlaneController@addPlaneReservation')->name('add-plane-reservation');
    // 
    // Route::resource('reservations', 'ApiReservationController');
});
