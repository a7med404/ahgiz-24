<?php

namespace Modules\Reservation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reservation\Http\Requests\CreateReservationRequest;
use Modules\Reservation\Entities\PlaneReservation;
use Session;


class PlaneReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        $planereservations = PlaneReservation::where('canceled_at', null)->orderBy('id', 'desc')->get();
        return view('reservation::planereservation.index',['planereservations'=> $planereservations]);
    }

    // show pending plane reservations //

    public function pendding()
    {
        $planereservations = PlaneReservation::where('canceled_at', null)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('reservation::planereservation.pendding', ['planereservations' => $planereservations]);
    }

    // show done reservations //
    public function done()
    {
        $planereservations = PlaneReservation::where('canceled_at', null)->where('status', 2)->orderBy('id', 'desc')->get();
        return view('reservation::planereservation.done', ['planereservations' => $planereservations]);
    }

    // clanceled plane reservations //

    public function conceled()
    {
        $planereservations = PlaneReservation::where('canceled_at', '!=', null)->orderBy('id', 'desc')->get();
        return view('reservation::planereservation.conceled', ['planereservations' => $planereservations]);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('reservation::planereservation.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('reservation::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {

        $planereservationsInfo = PlaneReservation::findOrFail($id);
        return view('reservation::planereservation.edit', ['planereservationsInfo' => $planereservationsInfo]);
     }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $planereservationsInfo = PlaneReservation::findOrFail($id);
        $data = [   
            'customer_id'     => $request->customer_id,
            'from_station_id' => $request->from_station_id,
            'to_station_id'   => $request->to_station_id,
            'company_id'      => $request->company_id,
            'from_date'       => $request->from_date,
            'to_date'         => $request->to_date,
            'status'          => $request->status,
            'note'            => $request->note,
        ];
        $planereservationsInfo->fill($data)->save();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Planereservation Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $planereseReservationForDelete = PlaneReservation::findOrFail($id);
        $planereseReservationForDelete->delete();
        Session::flash('flash_massage_type',2);
        return redirect()->back()->withFlashMassage('PlaneReservation Deleted Successfully');
    }
}
