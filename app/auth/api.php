<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'API'], function () {

    /*
    |--------------------------------------------------------------------------
    | This group for all API Routes 'prefix' => 'auth' and 'namespace' => 'User'
    |--------------------------------------------------------------------------
    |*/
    Route::group(['prefix' => 'auth', 'namespace' => 'User'], function () {
        Route::post('/login', 'LoginController');
        Route::post('/forgot', 'ForgotPasswordController');
        Route::post('/refresh', 'RefreshTokenController');

    /*
    | This group for all API Routes 'middleware' => 'auth'
    */
        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('/me', 'UserInfoController');
            Route::post('/reset', 'ResetPasswordController');
            Route::put('/me/password', 'ChangePasswordController');
            Route::post('/logout', 'LogoutController');
        });
    });

        
        Route::post('log/{filter}', ['middleware' => ['auth:api', 'roles'], function($filter = '-1', Request $request) {
                
            if ($filter == 'transactions') {
                $activities = \Spatie\Activitylog\Models\Activity::with('causer')->orderBy('id', 'desc')->where('subject_type', 'App\Transaction')->orWhere('subject_type', 'App\Journal')->orWhere('subject_type', 'App\Operation')->paginate(50);
            } else if ($filter == 'cars') {
                $activities = \Spatie\Activitylog\Models\Activity::with('causer')->orderBy('id', 'desc')->where('subject_type', 'App\Car')->paginate(50);
            } else if ($filter == 'users') {
                $activities = \Spatie\Activitylog\Models\Activity::with('causer')->orderBy('id', 'desc')->where('subject_type', 'App\User')->paginate(50);
            } else if ($filter == 'login') {
                $activities = \Spatie\Activitylog\Models\Activity::with('causer')->orderBy('id', 'desc')->where('log_name', 'login')->paginate(50);
            } else if ($filter == 'logout') {
                $activities = \Spatie\Activitylog\Models\Activity::with('causer')->orderBy('id', 'desc')->where('log_name', 'logout')->paginate(50);
            } else if ($filter == 'rsc-types') {
                $activities = \Spatie\Activitylog\Models\Activity::with('causer')->orderBy('id', 'desc')->where('subject_type', 'App\RSC_Type')->paginate(50);
            } else if ($filter == 'rsc-categories') {
                $activities = \Spatie\Activitylog\Models\Activity::with('causer')->orderBy('id', 'desc')->where('subject_type', 'App\RSC_Category')->paginate(50);
            } else {
                $activities = \Spatie\Activitylog\Models\Activity::with('causer')->orderBy('id', 'desc')->paginate(50);
            }
            return response()->json($activities, 200);
        }, 'roles' => ['administrator']]);

        # Operations API
        Route::group(['middleware' => ['auth:api', 'roles'], 'roles' => ['editor']], function(){
            Route::post('operations/{filter}/from/{fromDate}/to/{toDate}', 'OperationsController@list');
            Route::post('operations/{id}', 'OperationsController@post');
            Route::post('operations/find/{query}', 'OperationsController@find');
            Route::post('/operations/search', 'OperationsController@search');
        });


        Route::group(['middleware' => 'auth:api'], function () {
            # Settings Routes
            Route::post('/cars/{category}', 'Cars\CarController@list');
            Route::post('/cars/view/{id}', 'Cars\CarController@show');

            # Settings Routes
            Route::get('/currencies', 'API\Settings@currencies');
            Route::get('/countries', 'API\Settings@countries');
            Route::get('/languages', 'API\Settings@language');
            Route::get('/zones', 'API\Settings@zones');
            Route::post('/send', 'API\Settings@send');
            Route::post('markFav', 'API\Settings@markFav');
            Route::post('markRead', 'API\Settings@markRead')->name('markRead');
            Route::post('reply', 'API\Settings@reply');
            Route::get('/list/{filter}', 'API\Settings@list');    
            Route::post('/settings', 'Settings@save');
            Route::post('/settings/{filter}', 'Settings@save');
          

        });
});

            Route::group(['middleware' => 'auth:api'], function () {
            # Finance Routes
            Route::get('FinanceIndex', 'API\Finance\FinanceController@list');
            Route::post('filterFinance', 'API\Finance\FinanceController@listfilter');

            # Finance Routes
            Route::post('chart1', 'API\Finance\FinanceController@chart1Reload');
            Route::post('chart2', 'API\Finance\FinanceController@chart2Reload');
            Route::post('chart3', 'API\Finance\FinanceController@chart3Reload');

            Route::post('dashboard_widgets', [
                'middleware' => [ 'roles'],
                'uses' => 'API\Finance\FinanceController@get',
                'roles' => ['editor', 'viewer']
            ]);

            });


Route::post('/cars/{category}', 'API\Cars\CarController@list');
Route::post('/cars/view/{id}', 'API\Cars\CarController@show');

Route::post('dashboard_widgets', [
                'uses' => 'API\Finance\FinanceController@get'
            ]);


