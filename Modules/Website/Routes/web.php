<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::prefix('website')->group(function() {
// });


/*
| All Routes For Website
|****************************************************************************************************************************************
*/

Config::set('auth.defines', 'customer');

Route::group(['middleware' => 'customer:customer'], function () {

    Route::get('/profile', 'SiteCustomerController@profile')->name('profile');
    Route::get('/my-reservations', 'SiteCustomerController@myReservations')->name('my-reservations');
    Route::get('/customer/logout', 'SiteCustomerController@logout')->name('customer-logout');

    Route::get('/reservation/done', 'WebsiteController@reservationDone')->name('reservation-done');

    Route::post('/save-seats', 'WebsiteController@saveSeats')->name('save-seats');
    Route::get('/bus-details/{id}', 'WebsiteController@busDetails')->name('bus-details');
    Route::get('/pay-page', 'WebsiteController@payPage')->name('pay-page');
    Route::get('/pay/{id}', 'WebsiteController@pay')->name('pay');

    Route::get('/concel-reservation', 'WebsiteController@concelReservation')->name('concel-reservation');
    Route::post('/concel-reservation-post', 'WebsiteController@concelReservationPost')->name('concel-reservation-post');

    Route::get('/print/{id}', 'WebsiteController@print')->name('print');

    Route::post('/save-passenger', 'WebsiteController@savePassenger')->name('save-passenger');

});

Route::get('/', 'WebsiteController@index');

Route::resource('site-customer', 'SiteCustomerController');

Route::group(['middleware' => 'customer-guest:customer'], function () {
    Route::get('/singup', 'SiteCustomerController@showSingupForm')->name('singup');
    Route::post('/singup', 'SiteCustomerController@store')->name('post-singup');
    Route::get('/singin', 'SiteCustomerController@showSinginForm')->name('singin');
    Route::post('/singin', 'SiteCustomerController@singin')->name('post-singin');
});
Route::get('/search-post', 'WebsiteController@searchPost')->name('search-post');


// Route::get('/sing', function () {
//     return view('website::customer.sing-up-in');
// })->name('sing-up-in');

// Route::get('/result', function () {
//     return view('website::booking-steps.result');
// })->name('search-result');

// Route::get('/select-seat', function () {
//     return view('website::booking-steps.select-seat');
// })->name('select-seat');

// Route::get('/bus-details', function () {
//     return view('website::booking-steps.bus-details');
// })->name('bus-details');

// Route::get('/booking', function () {
//     return view('website::booking-steps.booking');
// })->name('booking');




