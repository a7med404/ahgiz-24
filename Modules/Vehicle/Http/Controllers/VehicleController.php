<?php

namespace Modules\Vehicle\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Vehicle\Entities\Vehicle;
use Modules\Vehicle\Http\Requests\CreateVehicleRequest;
use Session;

class VehicleController extends Controller
{ 
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $vehicles = Vehicle::orderBy('id', 'desc')->get();
        return view('vehicle::vehicles.index', ['vehicles' => $vehicles]);
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
    public function store(CreateVehicleRequest $request, Vehicle $vehicle)
    {
        $data = [
            'name'           => $request->name,
            'description'    => $request->description,
            'seats_number'   => $request->seats_number,
            'company_id'     => $request->company_id
        ];
        $vehicle->create($data);
        Session::flash('flash_massage_type', 1);
        return redirect('adminCpanel/vehicles')->withFlashMassage('Vehicle Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $vehicleInfo = Vehicle::findOrFail($id);
        return view('vehicle::vehicles.show', ['vehicleInfo' => $vehicleInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $vehicleInfo = Vehicle::findOrFail($id);
        return view('vehicle::vehicles.edit', ['vehicleInfo' => $vehicleInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateVehicleRequest $request, $id)
    {
        $vehicleInfo = Vehicle::findOrFail($id);
        $data = [
            'name'           => $request->name,
            'description'    => $request->description,
            'seats_number'   => $request->seats_number,
            'company_id'     => $request->company_id
        ];
        $vehicleInfo->fill($data)->save();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Vehicle Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $vehicleForDelete = Vehicle::findOrFail($id);
        $vehicleForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Vehicle Deleted Successfully');
    }
}
