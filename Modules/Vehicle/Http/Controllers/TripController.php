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
use Yajra\DataTables\DataTables;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('vehicle::trips.index');

        // if($request->has('filter')){
        //     $requestAll = array_except($request->toArray(), ['date_from', 'date_to']);
        //     $query = Trip::orderBy('id','desc');

        //     foreach ($requestAll as $key => $req) {
        //         if (!($req == "" || null)) {
        //             $query->where($key, $req);
        //         }
        //     }

        //     if (!($request->date_from == "" || null) && ($request->date_to   == "" || null)) {


        //         $query = $query->where('date', '>=', $request->date_from);
        //     }elseif (($request->date_from == "" || null) && !($request->date_to   == "" || null)) {
        //         $query = $query->where('date', '<=', $request->date_to);
        //     }elseif(!($request->date_from == "" || null) && !($request->date_to   == "" || null)){
        //         $query = $query->whereBetween('date', [$request->date_from, $request->date_to]);
        //     }

        //     $trips = $query->get();
        // }else {
        //     $trips = Trip::orderBy('id', 'desc')->get();
        // }
    }


    public function tripDataTables()
    {
        return DataTables::of(Trip::orderBy('id', 'desc')->get())
        ->addColumn('options', function ($trip) {
            return view('vehicle::trips.colums.options', ['id' => $trip->id, 'routeName' => 'trips']);
        })
        // ->addColumn('seat_numbers', function ($trip) {
        //     return $trip->trip->seats_number ;
        // })
        //         ->editColumn('customer_id', function ($trip) {
        //     return $trip->customer->c_name;
        // })
        ->editColumn('company_id', function ($trip) {
            return $trip->company->name;
        })

        ->editColumn('from_station_id', function ($trip) {
            return $trip->fromStation->name;
        })

        ->editColumn('to_station_id', function ($trip) {
            return $trip->toStation->name;
        })
        ->editColumn('status', function ($trip) {
            return $trip->status  == 0 ? '<span class="label label-light-warning">' .tripStatus()[$trip->status] . '</span>' : '<span class="label label-light-success">' . tripStatus()[$trip->status] . '</span>' ;
        })
        ->rawColumns([ 'options','company_id','from_station_id','to_station_id','status'])
        ->removeColumn('description')
        // ->setRowClass('{{ $gender == 0 ? "alert alert-success" : "alert alert-warning" }}')
        ->setRowId('{{$id}}')
        ->make(true);
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
        return view('vehicle::trips.previous');

        // if($request->has('filter')){
        //     $requestAll = array_except($request->toArray(), ['date_from', 'date_to']);
        //     $query = Trip::orderBy('id','desc');

        //     foreach ($requestAll as $key => $req) {
        //         if (!($req == "" || null)) {
        //             $query->where($key, $req);
        //         }
        //     }

        //     if (!($request->date_from == "" || null) && ($request->date_to   == "" || null)) {
        //         $query = $query->where('date', '>=', $request->date_from);
        //     }elseif (($request->date_from == "" || null) && !($request->date_to   == "" || null)) {
        //         $query = $query->where('date', '<=', $request->date_to);
        //     }elseif(!($request->date_from == "" || null) && !($request->date_to   == "" || null)){
        //         $query = $query->whereBetween('date', [$request->date_from, $request->date_to]);
        //     }
        //     $trips = $query->where('date','<=' , Carbon::today())->get();
        // }else {
        //     $trips = Trip::whereDate('date' ,'<=' , Carbon::today())->get();
        // }
    }


    public function previousDataTables()
    {
        return DataTables::of(Trip::whereDate('date' ,'<=' , Carbon::today())->get())
        ->addColumn('options', function ($previous) {
            return view('vehicle::trips.colums.options', ['id' => $previous->id, 'routeName' => 'trips']);
        })
        // ->addColumn('seat_numbers', function ($trip) {
        //     return $trip->trip->seats_number ;
        // })
        //         ->editColumn('customer_id', function ($trip) {
        //     return $trip->customer->c_name;
        // })
        ->editColumn('company_id', function ($previous) {
            return $previous->company->name;
        })

        ->editColumn('from_station_id', function ($previous) {
            return $previous->fromStation->name;
        })

        ->editColumn('to_station_id', function ($previous) {
            return $previous->toStation->name;
        })
        ->editColumn('status', function ($previous) {
            return $previous->status  == 0 ? '<span class="label label-light-warning">' .tripStatus()[$previous->status] . '</span>' : '<span class="label label-light-success">' . tripStatus()[$previous->status] . '</span>' ;
        })
        ->rawColumns([ 'options','company_id','from_station_id','to_station_id','status'])
        ->removeColumn('description')
        // ->setRowClass('{{ $gender == 0 ? "alert alert-success" : "alert alert-warning" }}')
        ->setRowId('{{$id}}')
        ->make(true);
    }
    // get the next trips //
    public function nextTrip(Request $request)
    {
        return view('vehicle::trips.next');

        // if($request->has('filter')){
        //     $requestAll = array_except($request->toArray(), ['date_from', 'date_to']);
        //     $query = Trip::orderBy('id','desc');

        //     foreach ($requestAll as $key => $req) {
        //         if (!($req == "" || null)) {
        //             $query->where($key, $req);
        //         }
        //     }

        //     if (!($request->date_from == "" || null) && ($request->date_to   == "" || null)) {
        //         $query = $query->where('date', '>=', $request->date_from);
        //     }elseif (($request->date_from == "" || null) && !($request->date_to   == "" || null)) {
        //         $query = $query->where('date', '<=', $request->date_to);
        //     }elseif(!($request->date_from == "" || null) && !($request->date_to   == "" || null)){
        //         $query = $query->whereBetween('date', [$request->date_from, $request->date_to]);
        //     }

        //     $trips = $query->get();
        // }else {
        //     $trips = Trip::whereDate('date' ,'>=' , Carbon::tomorrow())->get();
        // }
    }


    public function nextDataTables()
    {
        return DataTables::of(Trip::whereDate('date' ,'>=' , Carbon::tomorrow())->get())
        ->addColumn('options', function ($next) {
            return view('vehicle::trips.colums.options', ['id' => $next->id, 'routeName' => 'trips']);
        })
        // ->addColumn('seat_numbers', function ($trip) {
        //     return $trip->trip->seats_number ;
        // })
        //         ->editColumn('customer_id', function ($trip) {
        //     return $trip->customer->c_name;
        // })
        ->editColumn('company_id', function ($next) {
            return $next->company->name;
        })

        ->editColumn('from_station_id', function ($next) {
            return $next->fromStation->name;
        })

        ->editColumn('to_station_id', function ($next) {
            return $next->toStation->name;
        })
        ->editColumn('status', function ($next) {
            return $next->status  == 0 ? '<span class="label label-light-warning">' .tripStatus()[$next->status] . '</span>' : '<span class="label label-light-success">' . tripStatus()[$next->status] . '</span>' ;
        })
        ->rawColumns([ 'options','company_id','from_station_id','to_station_id','status'])
        ->removeColumn('description')
        // ->setRowClass('{{ $gender == 0 ? "alert alert-success" : "alert alert-warning" }}')
        ->setRowId('{{$id}}')
        ->make(true);
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
