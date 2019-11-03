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

Route::prefix('ticket')->group(function() {
    Route::get('/', 'TicketController@index');
});

Route::prefix('adminCpanel')->group(function() {
    Route::group(['middleware' => ['web', 'auth']], function(){
        Route::Resource('ticket', 'TicketController');
      
    });
});