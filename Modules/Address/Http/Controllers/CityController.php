<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\City;
use Modules\Address\Http\Requests\CreateCityRequest;
use Session;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $cities = City::orderBy('id', 'desc')->get();
        return view('address::cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('address::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateCityRequest $request, City $station)
    {
        $station->create($request->all());
        Session::flash('flash_massage_type', 1);
        return redirect('cpanel/cities')->withFlashMassage('City Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $stationInfo = City::findOrFail($id);
        return view('address::cities.show', ['stationInfo' => $stationInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $stationInfo = City::findOrFail($id);
        return view('address::cities.edit', ['stationInfo' => $stationInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateCityRequest $request, $id)
    {
        $stationInfo = City::findOrFail($id);
        $stationInfo->fill($request->all())->save();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('City Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $stationForDelete = City::findOrFail($id);
        $stationForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('City Deleted Successfully');
    }
}
