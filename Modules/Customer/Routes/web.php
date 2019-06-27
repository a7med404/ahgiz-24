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

Route::prefix('customer')->group(function() {
    Route::get('/', 'CustomerController@index');
});



Route::prefix('cpanel')->group(function() {
    Route::group(['middleware' => ['web', 'auth']], function(){
        Route::Resource('customers', 'CustomerController');
        Route::get('customers/delete/{id}', 'CustomerController@destroy')->name('customers.delete');
      
    });


    

    // Route::group(['middleware' => 'customer:customer'], function () {

    //     Route::get('/profile', 'CustomerController@profile')->name('profile');
    //     Route::get('/customer/logout', 'AllCustomerController@logout')->name('all-customers-logout');

    // });

    
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