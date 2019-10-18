<?php

namespace Modules\Reservation\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Reservation;
use Modules\Reservation\Transformers\ReservationResource;
use Modules\Vehicle\Transformers\TripResource;
use Modules\Vehicle\Transformers\AvailableTripResource;
use Modules\Reservation\Transformers\SingleReservationResource;
use Modules\Customer\Entities\Customer;
use Modules\Vehicle\Entities\Trip;
use Auth;
use DB;
use Modules\Vehicle\Transformers\SingleTripResource;

class ApiReservationController extends Controller
{
    public function myReservations(Request $request, $id)
    {

        $reservations = Reservation::orderBy('id')->where('customer_id', $id)->get();
        return ReservationResource::collection($reservations);
    }

    public function myReservationDetails($id)
    {
        return new SingleReservationResource(Reservation::findOrFail($id));
    }

    public function availableReservation(Request $request, Trip $trip)
    {
        $trips =  Trip::orderBy('id')
            ->where('from_station_id', $request->from_station_id)
            ->where('to_station_id', $request->to_station_id)->where('status', 1);
        if ($request->date != null) {
            $trips = $trips->where('date', $request->date)->get();
        } else {
            $trips = $trips->where('date', '>=', Date('Y-m-d'))->get();
        }

        # this section for get number of booked seats at any trip
        $passengers_nubmers_for_trip = $trips->map(function ($trip) {
            # loop through any reservation to get number of passengers for this reservation
            $reservations = $trip->reservations->map(function ($reservation) {
                $passengers = $reservation->passengers->count();
                return  $passengers;
            });
            # sum of the number of passengers for any trip
            return array_sum($reservations->toArray());
        });
        /**
         * ! to loop through any trip and filter that trip has avaliable seat less than required
         */
        // TODO:: Fix seat number issus
        $validTrips = $trips->map(function ($trip) use ($passengers_nubmers_for_trip, $request) {
            foreach ($passengers_nubmers_for_trip as $key => $value) {
                // dd(($trip->seats_number - $value)- $request->seats_number);
                if (($trip->seats_number - $value) >= $request->seats_number) {
                    return  $trip;
                } else {
                    return;
                }
            }
        });
        return AvailableTripResource::collection(collect($validTrips));
    }


    public function cancelReservation(Request $request)
    {
        $reservation = Reservation::join('customers', function ($join) {
            $join->on('reservations.customer_id', '=', 'customers.id');
        })->where('number', $request->number)->select('customers.id as customer_id', 'customers.phone_number', 'reservations.*')->first();
        if ($reservation) {
            if ($reservation->phone_number === addSudanKey($request->phone_number)) {
                $reservation->update(['canceled_at' => now()]);
                return response()->json(['message' => 'reservation canceled'], 200);
            } else {
                return response()->json(['message' => 'uncorrect phone number'], 422);
            }
        } else {
            return response()->json(['message' => 'uncorrect Reservation number'], 422);
        }
    }



    // public function     reserveStepOne(Request $request, $id)
    // {
    //     $trip =  Trip::orderBy('id')->where('id', $request->id)->first();
    //     return new SingleTripResource($trip);
    // }


    public function     reserveStepOne(Request $request)
    {
        $seats = $request->seats;
        $data = [
            'customer_id'       => Auth::guard('customer')->user()->id,
            'trip_id'           => $request->trip_id,
            'number'            => $request->number,
            'status'            => 1,
        ];
        $reservation = Reservation::create($data);
        if ($reservation) {
            if ($seats) {
                while ($seats >= 1) {
                    Passenger::create([
                        'name'              => request($seats . '-name'),
                        'gender'            => request($seats . '-gender'),
                        'reservation_id'    => $reservation->id,
                    ]);
                    $seats--;
                }
            }
        }

        $blance = $reservation->passengers->count() * $reservation->trip->price;
        return response()->json([
            'error'         => false,
            'message'       => 'you are logged out',
            'status_code'   => 200
        ]);
        Session::flash('flash_massage_type', 1);
        // return redirect()->route('pay-page')->with(['reservation' => $reservation, 'blance' => $blance])->withFlashMassage('تم اجراء حجز مبدئي الرجاء تأكيد الحجز عن طريق سداد رسوم التزاكر.');
        return view('website::booking-steps.pay', ['reservation' => $reservation, 'blance' => $blance])->withFlashMassage('Reservation Added Successfully');
    }
}
