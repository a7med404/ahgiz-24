<?php

namespace App\Http\Controllers\API\User;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Route;

class ChangePasswordController extends Controller
{
    public $successStatus = 200;
    public $client;

    public function __construct()
    {
        $this->client = Client::find(1);   
    }

    public function __invoke(Request $request){
        $user = \Auth::user();
        if (Hash::check($request->currentPassword, $user->password)) {
            DB::table('users')->where('id',$request->id)->update(['password' => bcrypt($request->newPassword), 'updated_at' => new \DateTime()] );

            $params = [
                'grant_type' => 'password',
                'client_id' => $this->client->id,
                'client_secret' => $this->client->secret,
                'scope' => '*',
            ];
            $user->token()->revoke();
            $request->request->add($params);
            $proxy = Request::create(url('oauth/token'), 'POST');
            return Route::dispatch($proxy);
        }

        return response()->json(['message'=>'Wrong password','success' => false], 400);
    }

}
