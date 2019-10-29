<?php

namespace Modules\Vehicle\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Vehicle\Entities\Trip;
use Modules\Vehicle\Http\Requests\CreateTripRequest;
use Carbon\Carbon;
use Session;
use DateTime;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->has('filter')){
            $requestAll = array_except($request->toArray(), ['date_from', 'date_to']);
            $query = Trip::orderBy('id','desc');

            foreach ($requestAll as $key => $req) {
                if (!($req == "" || null)) {
                    $query->where($key, $req);
                }
            }

            if (!($request->date_from == "" || null) && ($request->date_to   == "" || null)) {
                $query = $query->where('date', '>=', $request->date_from);
            }elseif (($request->date_from == "" || null) && !($request->date_to   == "" || null)) {
                $query = $query->where('date', '<=', $request->date_to);
            }elseif(!($request->date_from == "" || null) && !($request->date_to   == "" || null)){
                $query = $query->whereBetween('date', [$request->date_from, $request->date_to]);
            }
            

            $trips = $query->get();
        }else {
            $trips = Trip::orderBy('id', 'desc')->get();
        }
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
            'saleprice'         => $request->saleprice,
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
        return redirect('adminCpanel/trips')->withFlashMassage('Trip Added Successfully');
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
            'saleprice'         => $request->saleprice,
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
    public function search(Request $request)
    {
        // get all trip 
        $searchTrip = Trip::orderBy('id')->where('from_station_id','$request->from_station_id')
                                         ->where('to_station_id','$request->to_station_id')
                                         ->where('departure_time','$request->departure_time')
                                         ->first();
        dd($searchTrip);
    }

    // get the previous trips //
    public function previousTrip(Request $request)
    {
        if($request->has('filter')){
            $requestAll = array_except($request->toArray(), ['date_from', 'date_to']);
            $query = Trip::orderBy('id','desc');

            foreach ($requestAll as $key => $req) {
                if (!($req == "" || null)) {
                    $query->where($key, $req);
                }
            }

            if (!($request->date_from == "" || null) && ($request->date_to   == "" || null)) {
                $query = $query->where('date', '>=', $request->date_from);
            }elseif (($request->date_from == "" || null) && !($request->date_to   == "" || null)) {
                $query = $query->where('date', '<=', $request->date_to);
            }elseif(!($request->date_from == "" || null) && !($request->date_to   == "" || null)){
                $query = $query->whereBetween('date', [$request->date_from, $request->date_to]);
            }
            $trips = $query->where('date','<=' , Carbon::today())->get();
        }else {
            $trips = Trip::whereDate('date' ,'<=' , Carbon::today())->get();
        }
        return view('vehicle::trips.previous', ['trips' => $trips]);
    }


    // get the next trips //
    public function nextTrip(Request $request)
    {
        if($request->has('filter')){
            $requestAll = array_except($request->toArray(), ['date_from', 'date_to']);
            $query = Trip::orderBy('id','desc');

            foreach ($requestAll as $key => $req) {
                if (!($req == "" || null)) {
                    $query->where($key, $req);
                }
            }

            if (!($request->date_from == "" || null) && ($request->date_to   == "" || null)) {
                $query = $query->where('date', '>=', $request->date_from);
            }elseif (($request->date_from == "" || null) && !($request->date_to   == "" || null)) {
                $query = $query->where('date', '<=', $request->date_to);
            }elseif(!($request->date_from == "" || null) && !($request->date_to   == "" || null)){
                $query = $query->whereBetween('date', [$request->date_from, $request->date_to]);
            }

            $trips = $query->get();
        }else {
            $trips = Trip::whereDate('date' ,'>=' , Carbon::tomorrow())->get();
        }
        return view('vehicle::trips.next', ['trips' => $trips]);
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
