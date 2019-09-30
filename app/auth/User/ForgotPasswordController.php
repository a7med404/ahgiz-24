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

class ForgotPasswordController extends Controller
{
    public $successStatus = 200;
    public $client;

    public function __construct()
    {
        $this->client = Client::find(1);   
    }
    
    public function __invoke(Request $request){
        return response()->json([''], 204);
    }
}
