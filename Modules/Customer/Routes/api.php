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

Route::middleware('auth:api')->get('/customer', function (Request $request) {
    return $request->user();
});
    /*
    |--------------------------------------------------------------------------
    | This group for all API Routes 'prefix' => 'auth' and 'namespace' => 'User'
    |--------------------------------------------------------------------------
    |*/
    Route::group(['prefix' => 'auth'], function () {

        Route::post('/login-register', 'ApiCustomerController@loginRegister')->name('login-register');

    /*
    | This group for all API Routes 'middleware' => 'auth'
    */
        Route::group(['middleware' => 'auth:api'], function () {
            #this function for complate register and update customer profile
            Route::post('/customer-update/{id}', 'ApiCustomerController@update')->name('customer-update');
            Route::get('/customer-logout-api', 'ApiCustomerController@logout')->name('customer-logout-api');
            Route::delete('/customer-delete', 'ApiCustomerController@deleteAccount')->name('customer-delete');
        });
    });
