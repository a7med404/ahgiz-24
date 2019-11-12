<?php

namespace Modules\Address\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ApiAddressController extends Controller
{
    public function getDelegate(Request $request)
    {
        // $users = User::where('addresses.city', $city_id)->where('addresses.local', $local_id)->take(2)->get('phone_number');
        $users = DB::table('users')
            ->join('addresses', 'users.id', '=', 'addresses.addressable_id')
            ->where('addresses.city', $request->city)->where('addresses.local', $request->local)
            ->where('addressable_type', 'Modules\User\Entities\User')->take(2)->get('phone_number');
        return response()->json(['data' => $users], 200);
    }
}
