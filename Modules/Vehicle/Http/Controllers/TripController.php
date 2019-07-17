<?php

namespace Modules\Vehicle\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Vehicle\Entities\Trip;
use Modules\Vehicle\Http\Requests\CreateTripRequest;
use Session;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $trips = Trip::orderBy('id', 'desc')->get();
        return view('vehicle::trips.index', ['trips' => $trips]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('vehicle::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateTripRequest $request, Trip $trip)
    {
        $number = (int)str_replace('-', '', $request->date).date('s');
        $data = [
            'departure_time'    => $request->departure_time,
            'arrive_time'       => $request->arrive_time,
            'price'             => $request->price,
            'date'              => $request->date,
            'company_id'        => $request->company_id,
            'from_station_id'   => $request->from_station_id,
            'to_station_id'     => $request->to_station_id,
            'description'       => $request->description,
            'seats_number'      => $request->seats_number,
            'status'            => $request->status,
            'number'            => $number
        ];
        $trip->create($data);
        Session::flash('flash_massage_type', 1);
        return redirect('cpanel/trips')->withFlashMassage('Trip Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $tripInfo = Trip::findOrFail($id);
        return view('vehicle::trips.show', ['tripInfo' => $tripInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $tripInfo = Trip::findOrFail($id);
        return view('vehicle::trips.edit', ['tripInfo' => $tripInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateTripRequest $request, $id)
    {
        $tripInfo = Trip::findOrFail($id);
        $number = str_replace('-', '', $request->date);
        $data = [
            'departure_time'    => $request->departure_time,
            'arrive_time'       => $request->arrive_time,
            'price'             => $request->price,
            'date'              => $request->date,
            'company_id'        => $request->company_id,
            'from_station_id'   => $request->from_station_id,
            'to_station_id'     => $request->to_station_id,
            'description'       => $request->description,
            'seats_number'      => $request->seats_number,
            'status'            => $request->status,
            'number'            => $number
        ];
        $tripInfo->fill($data)->save();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Trip Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $tripForDelete = Trip::findOrFail($id);
        $tripForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Trip Deleted Successfully');
    }
}
