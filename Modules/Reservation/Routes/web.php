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




Route::prefix('adminCpanel')->group(function() {
    Route::group(['middleware' => ['web', 'auth']], function(){

        Route::resource('reservations','ReservationController');
        Route::get('reservations-conceled', 'ReservationController@conceled')->name('reservations.conceled');
        Route::get('reservations-conceled', 'ReservationController@conceled')->name('reservations.conceled');
        Route::get('reservations/delete/{id}', 'ReservationController@destroy')->name('reservations.delete');
        Route::get('reservations-pendding', 'ReservationController@pendding')->name('reservations.pendding');
        Route::get('reservations-done', 'ReservationController@done')->name('reservations.done');

        // datatables //
        Route::get('reservations-dataTables','ReservationController@reservationDataTables')->name('reservation-dataTables');

        Route::get('pendings-dataTables','ReservationController@pendingDataTables')->name('pendings-dataTables');
        Route::get('dones-dataTables','ReservationController@doneDataTables')->name('dones-dataTables');
        Route::get('canceleds-dataTables','ReservationController@canceledDataTables')->name('canceleds-dataTables');

        Route::get('mark-as-payed/{id}', 'ReservationController@markAsPayed')->name('reservations.mark-as-payed');

        // plane reservations //
        Route::resource('planeReservations','PlaneReservationController');
        Route::get('planeReservations-conceled', 'PlaneReservationController@conceled')->name('planeReservations.conceled');
        Route::get('planeReservations/delete/{id}', 'PlaneReservationController@destroy')->name('planeReservations.delete');
        Route::get('planeReservations-pendding', 'PlaneReservationController@pendding')->name('planeReservations.pendding');
        Route::get('planeReservations-done', 'PlaneReservationController@done')->name('planeReservations.done');

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
