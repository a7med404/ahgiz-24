<?php

namespace Modules\Reservation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Reservation;
use Modules\Reservation\Http\Requests\CreateReservationRequest;
use Session;

class ReservationController extends Controller
{
    # TODO::in case the customer typed anthor phone_number for the reservation
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $reservations = Reservation::where('canceled_at', null)->orderBy('id', 'desc')->get();
        return view('reservation::reservations.index', ['reservations' => $reservations]);
    }

    public function conceled()
    {
        $reservations = Reservation::where('canceled_at', '!=', null)->orderBy('id', 'desc')->get();
        return view('reservation::reservations.conceled', ['reservations' => $reservations]);
    }

    public function pendding()
    {
        $reservations = Reservation::where('canceled_at', null)->where('status', 1)->orderBy('id', 'desc')->get();
        return view('reservation::reservations.pendding', ['reservations' => $reservations]);
    }

    public function done()
    {
        $reservations = Reservation::where('canceled_at', null)->where('status', 2)->orderBy('id', 'desc')->get();
        return view('reservation::reservations.done', ['reservations' => $reservations]);
    }

    
    public function markAsPayed($id)
    {
        $reservationInfo = Reservation::findOrFail($id);
        $reservation = $reservationInfo->fill(['status'   => 2])->save();
        if($reservation){
            Session::flash('flash_massage_type', 2);
            return redirect()->back()->withFlashMassage('Reservation Updated Successfully');
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('reservation::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CreateReservationRequest $request, Reservation $reservation)
    {
        $number = Time().rand(0, 100);
        $data = [
            'customer_id'       => $request->customer_id,
            'trip_id'           => $request->trip_id,
            'number'            => $number,
            'status'            => $request->status
        ];
        $reservation = $reservation->create($data);
        if($reservation){
            if($request->seat_id){
                $reservation->seats()->attach($request->seat_id);
                Session::flash('flash_massage_type', 1);
                return redirect('adminCpanel/reservations')->withFlashMassage('Reservation Added Successfully');
            }
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $reservationInfo = Reservation::findOrFail($id);
        return view('reservation::reservations.show', ['reservationInfo' => $reservationInfo]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response 
     */
    public function edit($id)
    {
        $reservationInfo = Reservation::with('seats')->findOrFail($id);
        return view('reservation::reservations.edit', ['reservationInfo' => $reservationInfo]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateReservationRequest $request, $id)
    {
        $reservationInfo = Reservation::findOrFail($id);
        $data = [
            'customer_id'       => $request->customer_id,
            'reservation_id'    => $request->reservation_id,
            'trip_id'           => $request->trip_id,
            'status'            => $request->status
        ];
        $reservation = $reservationInfo->fill($data)->save();
        if($reservation){
            if($request->seat_id){
                $reservationInfo->seats()->sync($request->seat_id);
                Session::flash('flash_massage_type', 2);
                return redirect()->back()->withFlashMassage('Reservation Updated Successfully');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $reservationForDelete = Reservation::findOrFail($id);
        $reservationForDelete->delete();
        Session::flash('flash_massage_type', 2);
        return redirect()->back()->withFlashMassage('Reservation Deleted Successfully');
    }
}
