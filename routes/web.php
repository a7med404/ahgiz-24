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
Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/cpanel', 'DashboardController@index')->name('cpanel');
});



/*
| All Routes For Website
|****************************************************************************************************************************************
*/

// Auth::routes(); // hato to delete this method after redefine the routes

Route::get('/home', 'HomeController@index')->name('home');
