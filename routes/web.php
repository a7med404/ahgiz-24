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
    Route::get('/cpanel', function () { 
        //  panding reservations //
        $panding_reservation = Modules\Reservation\Entities\Reservation::where('conceled_at', null)
                                                                ->where('status', 1)->orderBy('id', 'desc')->get();
        // get panding exceptions //
        $panding_reservation_exception = Modules\Reservation\Entities\Reservation::where('conceled_at', null)
        ->where('status', 1)->orderBy('id', 'desc')->take(5)->get();

        // get  canceled reservations //
        $canceled_reservations = Modules\Reservation\Entities\Reservation::where('conceled_at', '!=', null)->orderBy('id', 'desc')->get();

        // get done reservations //
        $done_reservations = Modules\Reservation\Entities\Reservation::where('conceled_at', null)->where('status', 2)->orderBy('id', 'desc')->get();

        // users //
        $customers = Modules\Customer\Entities\Customer::orderBy('id','desc')->get();
        return view('cpanel.app',['panding_reservation' => $panding_reservation,
                    'panding_reservation_exception' => $panding_reservation_exception,
                    'canceled_reservations' => $canceled_reservations,
                    'done_reservations' => $done_reservations,
                    'customers' => $customers,
                    ]); 
                })->name('cpanel');       
});
/*
| All Routes For Website
|****************************************************************************************************************************************
*/

// Auth::routes(); // hato to delete this method after redefine the routes

Route::get('/home', 'HomeController@index')->name('home');
