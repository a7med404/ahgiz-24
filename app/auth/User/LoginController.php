<?php

namespace App\Http\Controllers\API\User;

use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
// use GuzzleHttp\Client;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public $successStatus = 200;
    public $client;

    public function __construct()
    {
        $this->client = Client::find(4);   
    }

    public function __invoke(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:3'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $params = [
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '*',
            ];



            $auth = Auth::user();
            $request->request->add($params);
            $proxy = Request::create(url('oauth/token'), 'POST', $request->all());
            //$auth = Request::create('/users/info', 'POST', Auth::user());
            // dd($this->client->secret, $request->all(), $proxy);
            $response = Route::dispatch($proxy);
            $json = (array) json_decode($response->getContent());
            $json['user'] = $auth;
            $response->setContent(json_encode($json));
            return $response;

        }
        else {
            return response()->json(['message'=>'Email  Or Password Wrong','success' => false], 401)->setStatusCode(401);
        }
    }



    // public $successStatus = 200;

    // public function __invoke(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'password' => 'required|min:3'
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }
    //     if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    //         $client = DB::table('oauth_clients')->where('user_id', Auth::user()->id)->first();   
    //         $params = [
    //             'grant_type' => 'password',
    //             'client_id' => $client->id,
    //             'client_secret' => $client->secret,
    //             'username' => $request->email,
    //             'password' => $request->password,
    //             'scope' => '*',
    //         ];

    //         $request->request->add($params);
    //         $proxy = Request::create(url('oauth/token'), 'POST');
    //         return Route::dispatch($proxy);

    //     }
    //     else {
    //         return response()->json(['message'=>'Email  Or Password Wrong','success' => false], 401);
    //     }
    // }


}
