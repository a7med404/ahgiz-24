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

use App\DataTables\CustomerDataTable;
use Modules\Customer\Entities\Customer;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Html\Builder;

Route::prefix('customer')->group(function() {
    Route::get('/', 'CustomerController@index');
});


Route::prefix('adminCpanel')->group(function() {
    Route::group(['middleware' => ['web', 'auth']], function(){
        Route::Resource('customers', 'CustomerController');
        Route::get('customers/delete/{id}', 'CustomerController@destroy')->name('customers.delete');


        Route::get('customers-dataTables','CustomerController@customerDataTables')->name('customers-dataTables');

        Route::get('customers-data', function(CustomerDataTable $dataTable, Builder $builder){
            if (request()->ajax()) {
                return DataTables::of(Customer::orderBy('id', 'desc')->get())->toJson();
            }
            $dataTable = $builder->columns([
                ['data' => 'id', 'name' => 'id', 'title' => 'Id'],
                ['data' => 'name', 'name' => 'name', 'title' => 'Name'],
                ['data' => 'email', 'name' => 'email', 'title' => 'Email'],
                ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
                ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'],
            ]);
            return view('customer::customers.index', compact('dataTable'));

            return $dataTable->render('customer::customers.index2');

            return $this->datatables
                ->eloquent($this->query())
                ->make(true);

            // ->parameters([
            //     'searching' => false,
            // ])
            return Yajra\Datatables\Datatables::of(Customer::query())->parameters([
                'buttons' => ['csv', 'excel', 'pdf', 'print'],
            ])->make(true);
        });

        Route::get('customers-data2', 'CustomerController@customerDataTables');
    });




    // Route::group(['middleware' => 'customer:customer'], function () {

    //     Route::get('/profile', 'CustomerController@profile')->name('profile');
    //     Route::get('/customer/logout', 'AllCustomerController@logout')->name('all-customers-logout');

    // });


});
