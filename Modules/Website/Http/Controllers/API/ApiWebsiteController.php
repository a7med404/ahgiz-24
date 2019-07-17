<?php

namespace Modules\Website\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Vehicle\Entities\Trip;
use Modules\Vehicle\Entities\Station;
use Modules\Vehicle\Transformers\TripResource;
use Modules\Vehicle\Transformers\SingleTripResource;

class ApiWebsiteController extends Controller
{
    public function searchPost(Request $request)
    {
        if ($request->date === null) {
            $trips = Trip::where('from_station_id', $request->from)
            ->where('to_station_id', $request->to)->where('status', 1)->where('date', '>=', Date('Y-m-d'))->orderBy('id', 'desc')->paginate(10);
        } else {
            $trips = Trip::where('from_station_id', $request->from)
            ->where('to_station_id', $request->to)
            ->where('date', $request->date)->where('status', 1)->where('date', '>=', Date('Y-m-d'))->orderBy('id', 'desc')->paginate(10);
        }
        $trips = Trip::all();
        return TripResource::collection($trips);
        return view('website::booking-steps.result', ['trips' => $trips, 'request' => $request]);
    }

    public function busDetails(Request $request, $id)
    {
        // dd(session()->all());
        $trip = Trip::where('id', $id)->get();
        // dd($request->all(), $trip);
        // return TripResource::collection(collect(Trip::findOrfail($id)));
        // return TripResource::collection($trip);
        $seats = [1,20,2];
        return ['trip' => TripResource::collection($trip)[0], 'seats' => $seats];
        return view('website::booking-steps.bus-details', ['trip' => $trip]);
    }
}
