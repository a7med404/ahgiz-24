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

Route::prefix('vehicle')->group(function() {
    Route::get('/', 'VehicleController@index');
});



Route::prefix('adminCpanel')->group(function() {
    Route::get('vehicles/stations-dataTables', 'StationController@stationDataTables')->name('stations-dataTables');

    Route::group(['middleware' => ['web', 'auth']], function(){

        Route::resource('vehicles','VehicleController');
        Route::get('vehicles/delete/{id}', 'VehicleController@destroy')->name('vehicles.delete');

        Route::resource('stations','StationController');
        Route::get('stations/delete/{id}', 'StationController@destroy')->name('stations.delete');

        Route::resource('routes','RouteController');
        Route::get('routes/delete/{id}', 'RouteController@destroy')->name('routes.delete');

        Route::resource('trips','TripController');
        Route::get('trips/delete/{id}', 'TripController@destroy')->name('trips.delete');
        route::post('/search-trip','TripController@search')->name('trips.search');
        route::get('/previous-trip','TripController@previousTrip')->name('trips.previous');
        route::get('/next-trip','TripController@nextTrip')->name('trips.next');

        // datatables //

        Route::get('trips-dataTables','TripController@tripDataTables')->name('trip-dataTables');
        Route::get('next-dataTables','TripController@nextDataTables')->name('next-dataTables');
        Route::get('previous-dataTables','TripController@previousDataTables')->name('previous-dataTables');


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
