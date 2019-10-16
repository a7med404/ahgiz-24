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

class ApiReservationController extends Controller
{
    public function myReservations(Request $request, $id)
    {
        return ReservationResource::collection(Reservation::orderBy('id')->where('customer_id', $id)->get());
    }

    public function myReservationDetails($id)
    {
        return new SingleReservationResource(Reservation::findOrFail($id));
    }

    public function availableReservation(Request $request, Trip $trip, $seats = 3)
    {
        $trips =  Trip::orderBy('id')->get();
        $multiplied = $trips->map(function ($trip) {
            $reservations = $trip->reservations->map(function ($reservation) use ($trip) {
                $ss = $reservation->passengers->count();
                return  $ss;
            });
            $s = array_sum($reservations->toArray());
            return $s;
        });

        $validTrips = [];
        foreach ($multiplied as $key => $value) {
            foreach ($trips as $trip) {
                if (($trip->seats_number - $value) >= $seats) {
                    $validTrips[] = $trip;
                }
            }
        }
        return AvailableTripResource::collection(collect($validTrips));
    }
    public function cancelReservation(Request $request)
    {
        $reservation = Reservation::join('customers', function ($join) {
            $join->on('reservations.customer_id', '=', 'customers.id');
        })->where('number', $request->number)->select('customers.id as customer_id', 'customers.phone_number', 'reservations.*')->first();
        if ($reservation) {
            if ($reservation->phone_number === $request->phone_number) {
                $reservation->update(['conceled_at' => now()]);
                return response()->json(['message' => 'reservation canceled'], 200);
            } else {
                return response()->json(['message' => 'uncorrect phone number'], 422);
            }
        } else {
            return response()->json(['message' => 'uncorrect Reservation number'], 401);
        }
    }
}
