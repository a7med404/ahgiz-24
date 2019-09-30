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
use Ramsey\Uuid\Generator\RandomBytesGenerator;
use Session;
use Validator;
class ApiCustomerController extends Controller
{   

    ////////////// for Registerain Customers ///////////// 

    public function update(Request $request, $id)
    {
            if(empty($id))
            return response()->json(['message' => 'Is Not Empty'], 422);
            // update data for customer 
            $customer = Customer::where('id',$id)
                                ->update([
                                    'email'             => $request->email,
                                    'c_name'            => $request->c_name,
                                    'gender'            => $request->gender,
                                    'birthdate'         => $request->birthdate
                                        ]);
            return response()->json(200);
    }

    /////////// for Login Customers /////////////////////

    public function loginRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number'=>'required|string|max:14|min:9',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if (Auth::guard('customer')->attempt(['phone_number' => $request->phone_number, 'password' => $request->phone_number])) {
            $customer = Auth::guard('customer')->user();
            $json['id'] = $customer->id;
            $json['c_name'] = $customer->c_name;
            $json['phone_number'] = $customer->phone_number;
            $json['email'] = $customer->email;
            $json['gender'] = $customer->gender;
            $json['birthdate'] = $customer->birthdate;
            $json['access_token'] = $customer->createToken('MyApp')->accessToken;
            $json['isNew'] = 0;
            $json['otp'] = $this->getOTP();
            return response()->json(['customer' => $json], 200);
        } else {
            // created data for customer 
            $pass = $request->phone_number;
            $customer = Customer::create([
                'phone_number'      => $request->phone_number,
                'password'          => Hash::make($pass),
            ]);
            // Access token 
            $accessToken = $customer->createToken('customerToken')->accessToken;
            // return response 
            $json['id'] = $customer->id;
            $json['c_name'] = $customer->c_name;
            $json['phone_number'] = $customer->phone_number;
            $json['email'] = $customer->email;
            $json['gender'] = $customer->gender;
            $json['brithdate'] = $customer->brithdate;
            $json['access_token'] = $accessToken;
            $json['isNew'] = 1;
            $json['otp'] = $this->getOTP();
            return response()->json(['customer' => $json], 200);
        }
    }

    public function getOTP()
    {
        $number = random_int(1000,9999);
        return $number;
    }

    ///////////////////// forget password ////////////////////////////////////

    public function deleteAccount(Request $request)
    {
         $successStatus = 200;
        $client = Client::find(1);   
        return response()->json([''], 204);
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
        // dd(4444);
        $accessToken = Auth::guard('customer')->token();
        dump($accessToken);
        DB::table('oauth_access_tokens')->where('id', $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json(array(
            'error'         => false,
            'message'       => 'you are logged out',
            'status_code'   => 200
        ));
        return response()->json(['status'=>true], 204);
    }














    
}
