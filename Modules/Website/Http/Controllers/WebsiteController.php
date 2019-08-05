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
            // $trips = Trip::all();
        return view('website::booking-steps.result', ['trips' => $trips, 'request' => $request, 'tripsCount' => $tripsCount]);
    }

    public function saveSeats(Request $request)
    {
        // dd($request->all());
        $seats = $request->seats;
        $trip = Trip::findOrFail($request->trip_id);
        return view('website::booking-steps.bus-details', ['trip' => $trip, 'seats' => $seats])->withFlashMassage('Reservation Added Successfully');
        // $data = [
        //     'customer_id'       => 1,//$request->customer_id,
        //     'trip_id'           => $request->trip_id,
        //     'status'            => 1
        // ];
        // $reservation = Reservation::create($data);
        // if($reservation){
        //     if($request->seats){
        //         $reservation->seats()->attach($request->seats);
        //         Session::flash('flash_massage_type', 1);
        //         return view('website::booking-steps.bus-details', ['trip' => $trip, 'seats' => $seats, 'reservation' => $reservation])->withFlashMassage('Reservation Added Successfully');
        //     }
        // }
    }
    


    public function savePassenger(Request $request)
    {
        $number = Time().rand(0, 100000);
        $seats = $request->seats;
        $data = [
            'customer_id'       => Auth::guard('customer')->user()->id,
            'trip_id'           => $request->trip_id,
            'number'            => $number,
            'status'            => 1,
        ];
        $reservation = Reservation::create($data);
        if($reservation){
            if($seats){
                while ($seats >= 1) {
                    $a = Passenger::create([
                        'name'              => request($seats.'-name'),
                        'gender'            => request($seats.'-gender'),
                        'reservation_id'    => $reservation->id,
                    ]);
                    $seats--;
                }
            }
        }
        $blance = $reservation->passengers->count() * $reservation->trip->price;
        Session::flash('flash_massage_type', 1);
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
