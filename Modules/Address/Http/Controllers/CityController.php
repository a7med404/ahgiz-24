<?php

namespace Modules\Address\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Address\Entities\City;
use Modules\Address\Http\Requests\CreateCityRequest;
use Session;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
    //     $cities = City::orderBy('id', 'desc')->get();
        return view('address::cities.index');
    }
    public function cityDataTables()
    {
        return DataTables::of(City::orderBy('id', 'desc')->get())
            ->addColumn('options', function ($city) {
                return view('address::cities.colums.options', ['id' => $city->id, 'routeName' => 'cities']);
            })
            // ->editColumn('type', function ($city) {
            //     return $city->type == 0 ? '<span class="label label-light-warning">' . StationType()[$city->type] . '</span>' : '<span class="label label-light-success">' . StationType()[$station->type] . '</span>';
            // })
            ->editColumn('parent_id', function ($station) {
                return getName('cities', $station->parent_id);
            })
            ->rawColumns(['options','parent_id'])
            ->setRowId('{{$id}}')
            ->make(true);

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
    public function store(CreateCityRequest $request, City $city)
    {
        $city->create($request->all());
        Session::flash('flash_massage_type', 1);
        return redirect('adminCpanel/cities')->withFlashMassage('City Added Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $cityInfo = City::findOrFail($id);
        return view('address::cities.show', ['cityInfo' => $cityInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $cityInfo = City::findOrFail($id);
        return view('address::cities.edit', ['cityInfo' => $cityInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateCityRequest $request, $id)
    {
        $cityInfo = City::findOrFail($id);
        $cityInfo->fill($request->all())->save();
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
        $cityInfoForDelete = City::findOrFail($id);
        $cityInfoForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('City Deleted Successfully');
    }
}
