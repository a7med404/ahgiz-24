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

Route::prefix('reservation')->group(function() {
    Route::get('/', 'ReservationController@index');
});
 



Route::prefix('cpanel')->group(function() {
    Route::group(['middleware' => ['web', 'auth']], function(){
        
        Route::resource('reservations','ReservationController');
        Route::get('reservations-conceled', 'ReservationController@conceled')->name('reservations.conceled');
        Route::get('reservations/delete/{id}', 'ReservationController@destroy')->name('reservations.delete');
        Route::get('reservations-pendding', 'ReservationController@pendding')->name('reservations.pendding');
        Route::get('reservations-done', 'ReservationController@done')->name('reservations.done');
        
        Route::get('mark-as-payed/{id}', 'ReservationController@markAsPayed')->name('reservations.mark-as-payed');
        
    });


    // Route::middleware('role:superadministrator|administrator')->group(function () {

    //     /*
    //     |--------------------------------------------------------------------------
    //     | change sidesetting
    //     |--------------------------------------------------------------------------
    //     */
    //     Route::get('/sitesetting', 'SiteSettingController@index')->name('site-setting');
    //     Route::post('/sitesetting/update', 'SiteSettingController@store')->name('site-setting-update');
    
    
    
    
    //     /*
    //     |--------------------------------------------------------------------------
    //     | Resource For Roles
    //     |--------------------------------------------------------------------------
    //     */
    //     Route::Resource('roles', 'RoleController');
    //     Route::get('roles/delete/{id}', 'RoleController@destroy')->name('roles.delete');
    
    
    
    
    //     /*
    //     |--------------------------------------------------------------------------
    //     | Resource For Permissions
    //     |--------------------------------------------------------------------------
    //     */
    //     Route::Resource('permissions', 'PermissionController');
    //     Route::get('permissions/delete/{id}', 'PermissionController@destroy')->name('permissions.delete');
    
    //   });
    


});