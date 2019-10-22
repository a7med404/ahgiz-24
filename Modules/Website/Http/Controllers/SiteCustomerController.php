<?php

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Http\Requests\CreateCustomerRequest;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

class SiteCustomerController extends Controller
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
            'phone_number'  => $request->phone_number,
            'password'      => Hash::make('password'),
        ];
        $customer = $customer->create($data);
        Auth::guard('customer')->login($customer);
        Session::flash('flash_massage_type', 1);

        if(URL::previous() == route('singup')){
            return redirect()->route('profile')->withFlashMassage('تم انشاء الحساب بنجاح');
        }
        return redirect()->back()->withFlashMassage('تم انشاء الحساب بنجاح');
    }



    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function profile()
    { 
        $customerInfo = Auth::guard('customer')->user();
        return view('website::customer.profile', ['customerInfo' => $customerInfo]);
    }

    public function myReservations()
    {
        $customerInfo = Customer::findOrFail(Auth::guard('customer')->user()->id);
        return view('website::customer.my-reservations', ['customerInfo' => $customerInfo]);
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
        # TODO:: set email and birthday
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

    

    public function showSinginForm()
    {
        return view('website::customer.singin');
    }

    public function showSingupForm()
    {
        return view('website::customer.singup');
    }



    public function singin(Request $request)
    {
        // Validation::class($request, [
        //     'phone_number' => 'required', 'password' => 'required',
        // ]);

        # TODO::login don't work 
        $rememberme = request()->has('remember_me')? true : false;
        // dd(Auth::guard('customer')->attempt($request->only('phone_number','password'),$request->filled('remember_me')));
        //     //Authentication passed...
        //     return redirect()
        //         ->intended(route('admin.home'))
        //         ->with('status','You are Logged in as Admin!');
        // }

        if(Auth::guard('customer')->attempt(['phone_number' => request('phone_number'), 'password' => request('phone_number')], $rememberme)){
          Session::flash('flash_massage_type');
          if(URL::previous() == route('singin')){
            return redirect()->route('profile')->withFlashMassage('Login Susscefully');
          }
          return redirect()->back()->withFlashMassage('Login Susscefully');
        }else{
          Session::flash('flash_massage_type', 4);
          return redirect()->back()->withFlashMassage('Phone Number Or Password Is\'t Correct');
        }
    }

    public function logout(Request $request)
    {
        \Auth::guard('customer')->logout();
        return redirect()->back()->withFlashMassage('Logout Susscefully');
    }
}
