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

// Route::middleware('auth:api')->get('/payment', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'API', 'middleware' => 'auth:api', 'prefix' => 'payment'], function () {
// SyberPay Routes
});
Route::post('syberpay/return', 'ApiPaymentController@return');
Route::post('syberpay/payment', 'ApiPaymentController@SyberPay');
Route::post('syberpay/notify', 'ApiPaymentController@notify');