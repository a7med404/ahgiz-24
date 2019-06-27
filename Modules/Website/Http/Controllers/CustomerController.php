<?php

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Http\Requests\CreateCustomerRequest;
use Illuminate\Support\Facades\Hash;
use Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('website::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('website::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateCustomerRequest $request, Customer $customer)
    {
        $data = [
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'password'      => Hash::make('password'),
        ];
        $customer->create($data);
        Session::flash('flash_massage_type', 1);
        return redirect('cpanel/customers')->withFlashMassage('Customer Added Successfully');
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
}
