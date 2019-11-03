<?php

namespace Modules\Customer\Http\Controllers;

use App\DataTables\CustomerDataTable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Http\Requests\CreateCustomerRequest;
use Illuminate\Support\Facades\Hash;
use Session;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

class CustomerController extends Controller
{
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(CustomerDataTable $dataTable, Builder $builder)
    {
        return view('customer::customers.index');
        // return view('customer::customers.index3');
        // return $dataTable->render('customer::customers.index');

        // if (request()->ajax()) {
        //     return DataTables::of(Customer::orderBy('id', 'desc')->get())->toJson();
        // }

        // // $dataTable = $builder->columns($dataTable->getColumns());
        // $dataTable = $builder->columns([
        //     ['data' => 'id', 'name' => 'id', 'title' => 'Id', 'width' => '60', 'addClass' => 'text-center'],
        //     ['data' => 'c_name', 'name' => 'c_name', 'title' => __('home/labels.name')],
        //     ['data' => 'phone_number', 'name' => 'phone_number', 'title' => __('home/labels.phone_number')],
        //     // ['data' =>  'customer.reservations', 'name' => 'his_reservation', 'title' => __('home/labels.his_reservation')],
        //     ['data' => 'email', 'name' => 'email', 'title' => __('home/labels.email')],
        //     ['data' => 'birthdate', 'name' => 'birthdate', 'title' => __('home/labels.birthdate')],
        //     ['data' => 'created_at', 'name' => 'created_at', 'title' => 'Created At'],
        //     ['data' => 'updated_at', 'name' => 'updated_at', 'title' => 'Updated At'],
        // ]);
        return view('customer::customers.index3');
    } 


    public function customerDataTables(CustomerDataTable $dataTable)
    {
        return DataTables::of(Customer::orderBy('id', 'desc')->get())
            ->addColumn('options', function ($customer) {
                return view('customer::customers.colums.options', ['id' => $customer->id, 'routeName' => 'customers']);
            })
            ->addColumn('his_reservation', function (Customer $customer) {
                return '<span class="label label-info">' . $customer->reservations->count() . '</span>';
            })
            ->editColumn('gender', function ($customer) {
                return $customer->gender == 0 ? '<span class="label label-success">' . maleOrfemale()[$customer->gender] . '</span>' : '<span class="label label-warning">' . maleOrfemale()[$customer->gender] . '</span>';
            })
            ->rawColumns(['his_reservation', 'options', 'gender'])
            ->removeColumn('password')
            // ->setRowClass('{{ $gender == 0 ? "alert alert-success" : "alert alert-warning" }}')
            ->setRowId('{{$id}}')
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('customer::customers.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateCustomerRequest $request, Customer $customer)
    {
        return "ok";
        $data = [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            //'password'      => Hash::make('password'),
        ];
        $customer->create($data);
        Session::flash('flash_massage_type', 1);
        return redirect('adminCpanel/customers')->withFlashMassage('Customer Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $customerInfo = Customer::findOrFail($id);
        return view('customer::customers.show', ['customerInfo' => $customerInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $customerInfo = Customer::findOrFail($id);
        return view('customer::customers.edit', ['customerInfo' => $customerInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateCustomerRequest $request, $id)
    {
        $customerInfo = Customer::findOrFail($id);
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ];
        $customerInfo->fill($data)->save();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Customer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $customerForDelete = Customer::findOrFail($id);
        $customerForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Customer Deleted Successfully');
    }

    public function repport()
    {
        // $customers = customer::orderBy('id', 'desc')->get();
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('customer::customers.repport', ['customers' => $customers]);
    }
}
