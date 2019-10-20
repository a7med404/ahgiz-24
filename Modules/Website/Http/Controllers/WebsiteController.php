<?php

namespace Modules\Website\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Vehicle\Entities\Trip;
use Modules\Vehicle\Entities\Station;
use Modules\Reservation\Entities\Reservation;
use Modules\Reservation\Entities\Passenger;
use Modules\Reservation\Http\Requests\CreateReservationRequest;
use Session;
use Auth;
use Carbon\Traits\Date;
use Modules\Customer\Entities\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $stations = Station::orderBy('id', 'desc')->get();
        return view('website::index', ['stations' => $stations]);
    }

    public function searchPost(Request $request)
    {

        $stations = Station::orderBy('id', 'desc')->get();
        if ($request->date === null) {
            $tripsCount = Trip::where('from_station_id', $request->from)
            ->where('to_station_id', $request->to)->where('status', 1)->where('date', '>=', Date('Y-m-d'))->orderBy('id', 'desc')->count();
            $trips = Trip::where('from_station_id', $request->from)
            ->where('to_station_id', $request->to)->where('status', 1)->where('date', '>=', Date('Y-m-d'))->orderBy('id', 'desc')->paginate(10);
        } else {
            $tripsCount = Trip::where('from_station_id', $request->from)
            ->where('to_station_id', $request->to)->where('status', 1)->where('date', '>=', Date('Y-m-d'))->orderBy('id', 'desc')->count();
            $trips = Trip::where('from_station_id', $request->from)
            ->where('to_station_id', $request->to)
            ->where('date', $request->date)->where('status', 1)->where('date', '>=', Date('Y-m-d'))->orderBy('id', 'desc')->paginate(10);
        }

        return view('website::booking-steps.result', ['trips' => $trips, 'request' => $request, 'tripsCount' => $tripsCount, 'stations' => $stations]);
    }

    public function saveSeats(Request $request)
    {
        $seats = $request->seats;
        $trip = Trip::findOrFail($request->trip_id);
        return view('website::booking-steps.bus-details', ['trip' => $trip, 'seats' => $seats])->withFlashMassage('Reservation Added Successfully');
    }
    


    public function savePassenger(Request $request)
    {
        $isSameForm = session()->get('isSameForm');
        // dd($isSameForm, request()->all(), $isSameForm == $request->number);
 
        # this check for don't debricate row in the database on refresh page
        if($isSameForm == $request->number){
            if($request->email && Auth::guard('customer')->user()->email == null){
                Customer::findOrFail(Auth::guard('customer')->user()->id)->update(['email' => $request->email]);
            }
            // $number = Time().rand(0, 100);
            $seats = $request->seats;
            $data = [
                'customer_id'       => Auth::guard('customer')->user()->id,
                'trip_id'           => $request->trip_id,
                'number'            => $request->number,
                'status'            => 1,
            ];
            $reservation = Reservation::create($data);
            if($reservation){
                if($seats){
                    while ($seats >= 1) {
                        Passenger::create([
                            'name'              => request($seats.'-name'),
                            'gender'            => request($seats.'-gender'),
                            'reservation_id'    => $reservation->id,
                        ]);
                        $seats--;
                    }
                    session()->put('isSameForm', null);
                    session()->put('reservationID', $reservation->id);
                }
            }
        }else {
            $reservation = Reservation::where('id', session()->get('reservationID'))->first();
        }
        $blance = $reservation->passengers->count() * $reservation->trip->price;
        Session::flash('flash_massage_type', 1);
        // return redirect()->route('pay-page')->with(['reservation' => $reservation, 'blance' => $blance])->withFlashMassage('تم اجراء حجز مبدئي الرجاء تأكيد الحجز عن طريق سداد رسوم التزاكر.');
        return view('website::booking-steps.pay', ['reservation' => $reservation, 'blance' => $blance])->withFlashMassage('Reservation Added Successfully');
    }


    public function payPage(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $blance = $reservation->seats->count() * $reservation->trip->price;
        return view('website::booking-steps.pay', ['reservation' => $reservation, 'blance' => $blance]);
    }

    public function pay(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $blance = $reservation->seats->count() * $reservation->trip->price;
        return view('website::booking-steps.done', ['reservation' => $reservation, 'blance' => $blance]);
    }

    public function reservationDone(Request $request)
    {
        #TODO::set the class
        $reservation = Reservation::findOrFail(82);
        $blance = $reservation->seats->count() * $reservation->trip->price;
        return view('website::booking-steps.done', ['reservation' => $reservation, 'blance' => $blance]);
    }


    public function concelReservation()
    {
        return view('website::booking-steps.concel-reservation');
    }

    public function concelReservationPost(Request $request)
    {
        if(request('t-c-concel-reservation')){
            $reservation = Reservation::join('customers', function ($join) {
                $join->on('reservations.customer_id', '=', 'customers.id');
            })->where('number', $request->number)->select('customers.id as customer_id', 'customers.phone_number', 'reservations.*')->first();
            if($reservation){
                if($reservation->phone_number === $request->phone_number){
                    $reservation->update(['canceled_at' => now()]);
                    Session::flash('flash_massage_type', 1);
                    return redirect()->back()->withFlashMassage('تم الغاء الحجز بنجاح.');
                }else{
                    return redirect()->back()->withFlashMassage('رقم الهاتف الذي قمت بادخاله لم يتم استخدامه في  اجراء هذا الحجز.');
                }
            }else{
                return redirect()->back()->withFlashMassage('رقم الحجز الحجز غير صحيح.');
            }
        }else{
            return redirect()->back()->withFlashMassage('يبجب الموافقة علي شروط و قوانين الغاء الحجز.');
        }
    }
    

    
    public function busDetails(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        return view('website::booking-steps.bus-details', ['trip' => $trip]);
    }

    public function print(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('website::booking-steps.print', ['reservation' => $reservation]);
    }

    
}
