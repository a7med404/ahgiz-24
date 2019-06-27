<?php

namespace Modules\Vehicle\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Vehicle\Entities\Route;
use Modules\Vehicle\Http\Requests\CreateRouteRequest;
use Session;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $routes = Route::orderBy('id', 'desc')->get();
        return view('vehicle::routes.index', ['routes' => $routes]);
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
    public function store(CreateRouteRequest $request, Route $route)
    {
        $data = [
            'name'              => $request->name,
            'mileage'           => $request->mileage,
            'from_station_id'   => $request->from_station_id,
            'to_station_id'     => $request->to_station_id
        ];
        $route->create($data);
        Session::flash('flash_massage_type', 1);
        return redirect('cpanel/routes')->withFlashMassage('Route Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $routeInfo = Route::findOrFail($id);
        return view('vehicle::routes.show', ['routeInfo' => $routeInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $routeInfo = Route::findOrFail($id);
        return view('vehicle::routes.edit', ['routeInfo' => $routeInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateRouteRequest $request, $id)
    {
        $routeInfo = Route::findOrFail($id);
        $data = [
            'name'              => $request->name,
            'mileage'           => $request->mileage,
            'from_station_id'   => $request->from_station_id,
            'to_station_id'     => $request->to_station_id
        ];
        $routeInfo->fill($data)->save();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Route Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $routeForDelete = Route::findOrFail($id);
        $routeForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Route Deleted Successfully');
    }
}
