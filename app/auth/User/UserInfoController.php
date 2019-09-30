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

class UserInfoController extends Controller
{
    public function __invoke(Request $request)
    {
        // dd($request->all());
        $user = \App\User::find($request->id)->first();
        return response()->json(array(
            'error' => false,
            'user' => $user,
            'status_code' => 200
        ));
    }

}
