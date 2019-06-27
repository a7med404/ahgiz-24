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

// Config::set('auth.defines', 'customer');

// Route::group(['middleware' => 'customer:customer'], function () {

//     Route::get('/profile', 'AllCustomerController@profile')->name('profile');
//     Route::get('/customer/logout', 'AllCustomerController@logout')->name('all-customers-logout');

// });

  
Route::get('/', 'WebsiteController@index');

Route::resource('site-customer', 'SiteCustomerController');
Route::get('/profile', 'SiteCustomerController@profile')->name('profile');

Route::get('/singup', 'SiteCustomerController@showSingupForm')->name('singup');
Route::post('/singup', 'SiteCustomerController@store');
Route::get('/singin', 'SiteCustomerController@showSinginForm')->name('singin');
Route::post('/singin', 'SiteCustomerController@singin');



Route::get('/sing', function () {
    return view('website::customer.sing-up-in');
})->name('sing-up-in');

Route::get('/result', function () {
    return view('website::booking-steps.result');
})->name('search-result');

Route::get('/select-seat', function () {
    return view('website::booking-steps.select-seat');
})->name('select-seat');

Route::get('/bus-details', function () {
    return view('website::booking-steps.bus-details');
})->name('bus-details');

Route::get('/pay', function () {
    return view('website::booking-steps.pay');
})->name('pay');


Route::post('/search-post', function () {
    // return view('website::booking-steps.no-result');
    return dd(request()->all());
})->name('search-post');



Route::get('/booking', function () {
    return view('website::booking-steps.booking');
})->name('booking');




