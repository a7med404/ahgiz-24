<?php

namespace Modules\Reservation\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\PlaneReservation;

class ApiPlaneController extends Controller
{

    public function addPlaneReservation(Request $request)
    {
        $data = [
            'customer_id'       => auth()->user()->id,
            'from_station_id'   => $request->from_station_id,
            'to_station_id'     => $request->to_station_id,
            'company_id'        => $request->company_id,
            'date'              => $request->date,
            'number'            =>  Time() . rand(0, 100),
            'status'            => 1,
        ];
        $reservation = PlaneReservation::create($data);

        if ($reservation) {
            // event(new ReservationDoneEvent($reservation));
            return response()->json([ 'reservation_number' => $reservation->id ], 200);
        }
        
    }

}
