<?php

namespace Modules\Reservation\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Reservation;
use Modules\Reservation\Transformers\ReservationResource;
use Modules\Vehicle\Transformers\AvailableTripResource;
use Modules\Reservation\Transformers\SingleReservationResource;
use Modules\Vehicle\Entities\Trip;
use Modules\Reservation\Entities\Passenger;
use Modules\Reservation\Events\ReservationDoneEvent;

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


    public function reserveStepOne(Request $request, $tripId)
    {
        #TODO:: this stap must be in transaction
        $names = $request->names;
        $genders = $request->genders;

        $data = [
            'customer_id'       => auth()->user()->id,
            'trip_id'           => $tripId,
            'number'            =>  Time() . rand(0, 100),
            'status'            => 1,
        ];
        #TODO:: Save contact information on passengers table if the customer changed his contact info
        // if (addSudanKey($request->contact_number) != auth()->user()->phone_number) {
        //     dd(auth()->user()->phone_number, 555);
        // }else{

        // }
        $reservation = Reservation::create($data);
        if ($reservation) {
            if ($names) {

                $contact = auth()->user()->phone_number;
                if (addSudanKey($request->contact_number) != auth()->user()->phone_number) {
                    $contact = addSudanKey($request->contact_number);
                }
                $key = 0;
                while ($names->count() >= 1) {
                    Passenger::create([
                        'name'              => $names[$key],//request($seats . '-name'),
                        'gender'            => $genders[$key],//request($seats . '-gender'),
                        'reservation_id'    => $reservation->id,
                        'phone_number'      => $contact,
                    ]);
                    $names++;
                    $key++;
                }

                # Sent Reservation details to phone number => $contact
                #TODO::custom SMS content SMSStyle
                if ($contact) {
                    event(new ReservationDoneEvent($reservation, $contact));
                }

            }
        }

        $blance = $reservation->passengers->count() * $reservation->trip->price;
        return response()->json([
            'blance'         => $blance,
            'status_code'   => 200
        ]);
        Session::flash('flash_massage_type', 1);
        // return redirect()->route('pay-page')->with(['reservation' => $reservation, 'blance' => $blance])->withFlashMassage('تم اجراء حجز مبدئي الرجاء تأكيد الحجز عن طريق سداد رسوم التزاكر.');
        return view('website::booking-steps.pay', ['reservation' => $reservation, 'blance' => $blance])->withFlashMassage('Reservation Added Successfully');
    }
}
