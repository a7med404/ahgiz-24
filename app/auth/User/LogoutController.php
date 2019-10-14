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

class LogoutController extends Controller
{
    public function __invoke(Request $request){
        $accessToken = Auth::user()->token();
        // dd($accessToken);
        DB::table('oauth_access_tokens')->where('id', $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return response()->json(array(
            'error' => false,
            'message' => 'you are logged out',
            'status_code' => 200
        ));
        // return response()->json(['status'=>true], 204);
    }
}
