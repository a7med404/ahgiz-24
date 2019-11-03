<?php

namespace Modules\Vehicle\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Vehicle\Entities\Station;
use Modules\Vehicle\Http\Requests\CreateStationRequest;
use Session;
use Yajra\DataTables\DataTables;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // $stations = Station::orderBy('id', 'desc')->get();
        return view('vehicle::stations.index');
    }

    public function stationDataTables()
    {
        return DataTables::of(Station::orderBy('id', 'desc')->get())
            ->addColumn('options', function ($station) {
                return view('vehicle::stations.colums.options', ['id' => $station->id, 'routeName' => 'stations']);
            })
            ->editColumn('type', function ($station) {
                return $station->type == 0 ? '<span class="label label-light-warning">' . StationType()[$station->type] . '</span>' : '<span class="label label-light-success">' . StationType()[$station->type] . '</span>';
            })
            ->editColumn('city', function ($station) {
                return getName('cities', $station->city_id);
            })
            ->rawColumns(['options', 'type'])
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
    public function store(CreateStationRequest $request, Station $station)
    {
        $data = [
            'name'    => $request->name,
            'city'    => $request->city,
            'type'    => $request->type,
        ];
        $station->create($data);
        Session::flash('flash_massage_type', 1);
        return redirect('adminCpanel/stations')->withFlashMassage('Station Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $stationInfo = Station::findOrFail($id);
        return view('vehicle::stations.show', ['stationInfo' => $stationInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $stationInfo = Station::findOrFail($id);
        return view('vehicle::stations.edit', ['stationInfo' => $stationInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateStationRequest $request, $id)
    {
        $stationInfo = Station::findOrFail($id);
        $data = [
            'name'    => $request->name,
            'city'    => $request->city,
            'type'    => $request->type,

        ];
        $stationInfo->fill($data)->save();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Station Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $stationForDelete = Station::findOrFail($id);
        $stationForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Station Deleted Successfully');
    }
}
