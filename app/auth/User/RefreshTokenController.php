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

class RefreshTokenController extends Controller
{
    public $client;
    public function __construct()
    {
        $this->client = Client::find(4);   
    }

    public function __invoke(Request $request){
        $validator = Validator::make($request->all(), [
            'refresh_token' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $params = [
            'grant_type' => 'refresh_token',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            // 'username' => $request->email,
            // 'password' => $request->password,
        ];

        $request->request->add($params);
        $proxy = Request::create(url('oauth/token'), 'POST');
        return Route::dispatch($proxy);

    }

}
