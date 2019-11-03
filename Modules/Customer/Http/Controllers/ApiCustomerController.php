<?php

namespace Modules\Customer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Customer\Entities\Customer;
use Modules\Customer\Http\Requests\CreateCustomerRequest;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use App\Models\Passport\Token;
use Modules\Customer\Events\CustomerRegisteredOrLoginEvent;
use Ramsey\Uuid\Generator\RandomBytesGenerator;
use Session;
use Validator;

class ApiCustomerController extends Controller
{

    public $optValue;
    ////////////// for Registerain Customers /////////////

    public function update(Request $request, $id)
    {
        # this function for complate register and update customer profile
        if (empty($id))
            return response()->json(['errors' => 'Invalid Customer id'], 404);

        // $validator = Validator::make($request->all(), [
        //     'c_name' => 'required|string|max:14',
        //     // 'email' => 'email|string|min:5',
        // ]);
        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->errors()], 422);
        // }

        // update data for customer
        $data = [
            'c_name' => $request->c_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate
        ];
        $customer = Customer::where('id', $id)->update($data);
        if ($customer) {
            return response()->json(['message' => 'updated done'], 200);
        }
        return response()->json(['errors' => 'Invalid Customer id'], 404);
    }

    /////////// for Login Customers /////////////////////

    public function loginRegister(Request $request)
    {
        $this->optValue = $this->getOTP();
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:9|min:9',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (Auth::guard('customer')->attempt(['phone_number' => addSudanKey($request->phone_number), 'password' => addSudanKey($request->phone_number)])) {
            $customer = Auth::guard('customer')->user();
            $json['id'] = $customer->id;
            $json['c_name'] = $customer->c_name;
            $json['phone_number'] = $customer->phone_number;
            $json['email'] = $customer->email;
            $json['gender'] = $customer->gender;
            $json['birthdate'] = $customer->birthdate;
            $json['access_token'] = $customer->createToken('MyApp')->accessToken;
            $json['isNew'] = 0;
            $json['otp'] = $this->optValue;
            $json['customer_update']    = route('customer-update', ['id' => $customer->id]);
            $json['customer_logout']    = route('customer-logout-api');
            $json['customer_delete']    = route('customer-delete');
            $json['my_reservations']    = route('customer-reservations', ['id' => $customer->id]);
            $json['search_reservation'] = route('search-reservation');
            $json['get_bus_stations']   = route('get-bus-stations');
            // if ($customer) {
            //     //TODO::handel return value of CustomerRegisteredOrLoginEvent
            //     event(new CustomerRegisteredOrLoginEvent($customer, $this->optValue));
            // }
            return response()->json(['customer' => $json], 200);
        } else {
            // created data for customer
            $customer = Customer::create([
                'phone_number'      => addSudanKey($request->phone_number),
                'password'          => Hash::make(addSudanKey($request->phone_number)),
            ]);
            // Access token
            $accessToken = $customer->createToken('customerToken')->accessToken;

            // // return response
            // if ($customer) {
            //     event(new CustomerRegisteredOrLoginEvent($customer, $this->optValue));
            // }
            $json['id'] = $customer->id;
            $json['c_name'] = $customer->c_name;
            $json['phone_number'] = $customer->phone_number;
            $json['email'] = $customer->email;
            $json['gender'] = $customer->gender;
            $json['birthdate'] = $customer->birthdate;
            $json['access_token'] = $accessToken;
            $json['isNew'] = 1;
            $json['otp'] = $this->optValue;
            $json['customer_update'] = route('customer-update', ['id' => $customer->id]);
            $json['customer_logout'] = route('customer-logout-api');
            $json['customer_delete'] = route('customer-delete');
            $json['my_reservations'] = route('my-reservations', ['id' => $customer->id]);
            $json['search_reservation'] = route('search-reservation');
            $json['get_bus_stations'] = route('get-bus-stations');

            return response()->json(['customer' => $json], 201);
        }
    }

    public function getOTP()
    {
        $number = random_int(1000, 9999);
        return $number;
    }

    ///////////////////// forget password ////////////////////////////////////

    public function deleteAccount(Request $request)
    {
        #TODO:: chack when delete something delete items that belong to it
        $customerForDelete = Auth::user();
        $customerTokens = $customerForDelete->tokens;

        foreach ($customerTokens as $token) {
            $token->revoke();
            $token->delete();
        }
        $done = $customerForDelete->delete();
        if($done){
            return response()->json([
                'error'         => false,
                'message'       => 'Customer Deleted Successfully',
                'status_code'   => 200
            ], 200);
        }
        return response()->json(['status' => false], 500);
    }

    ///////////////////////////////// user profile /////////////////////////////

    public function profile(Request $request)
    {
        $user = \App\User::find($request->id)->first();
        return response()->json(array(
            'error'         => false,
            'user'          => $user,
            'status_code'   => 200
        ));
    }

    ////////////////////////////// logout //////////////////////////////////

    public function logout(Request $request)
    {
        $accessToken = Auth::user()->token();
        $revoked = DB::table('oauth_access_tokens')->where('id', $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        if($revoked){
            return response()->json([
                'error'         => false,
                'message'       => 'you are logged out',
            ], 200);
        }
        return response()->json(['status' => false], 500);
    }
}
