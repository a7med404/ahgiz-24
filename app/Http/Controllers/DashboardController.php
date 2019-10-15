<?php

namespace App\Http\Controllers;
use Modules\Customer\Entities\Customer;
use Modules\Reservation\Entities\Reservation;
use Modules\Reservation\Entities\Passenger;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = Customer::count();
        $cancelRes      = Reservation::where('conceled_at', '!=', null)->count();
        $complateRes    = Reservation::where('status', '=', 2)->count();
        $TempRes        = Reservation::where('conceled_at', null)->where('status', '=', 1)->count();
        $pendingRes     = Reservation::where('conceled_at', null)
                                     ->where('status', 1)->orderBy('created_at', 'desc')->get()->take(5);
        $genderFemale   = Passenger::where('gender',0)->count();
        $genderMale     = Passenger::where('gender',1)->count();
        $syperMethod    = Reservation::where('pay_method',3)->count(); 
        $bankMethod    = Reservation::where('pay_method',2)->count(); 
        $cashMethod    = Reservation::where('pay_method',1)->count(); 
        return view('cpanel.app',compact('user','cancelRes','complateRes','TempRes','pendingRes',
                                'genderFemale','genderMale','syperMethod','bankMethod','cashMethod'));
    }
}
