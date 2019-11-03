<?php

namespace Modules\Reservation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Reservation;
use Modules\Reservation\Http\Requests\CreateReservationRequest;
use Session;
use DB;

class ReservationController extends Controller
{
    # TODO::in case the customer typed anthor phone_number for the reservation
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->has('filter')){
            $requestAll = array_except($request->toArray(), ['date_from','date_to']);
            $query = Reservation::where('canceled_at', null)->join('trips', function ($join) {

                $join->on('reservations.trip_id', '=', 'trips.id');
            })->select('reservations.*');

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

            $reservations = $query->get();
        }else {
            // $trips = Trip::orderBy('id', 'desc')->get();
            $reservations = Reservation::where('canceled_at', null)->orderBy('id', 'desc')->get();

        }
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
<<<<<<< HEAD
=======
                Session::flash('flash_massage_type', 1);
                return redirect('adminCpanel/reservations')->withFlashMassage('Reservation Added Successfully');
>>>>>>> 84d175c7ca9710f74c293205bef0beda446c306a
            }
            Session::flash('flash_massage_type', 1);
            return redirect()->back()->withFlashMassage('Reservation Added Successfully');
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
        $reservationInfo = Reservation::with('passengers')->findOrFail($id);
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
        $number = Time().rand(0, 100);

        $data = [
            'customer_id'       => $request->customer_id,
            'reservation_id'    => $request->reservation_id,
            'number'            => $number,
            'trip_id'           => $request->trip_id,
            'status'            => $request->status
        ];
        $reservation = $reservationInfo->fill($data)->save();
        if($reservation){
            if($request->seat_id){
                $reservationInfo->passengers()->sync($request->seat_id);

            }
            Session::flash('flash_massage_type', 2);
            return redirect()->back()->withFlashMassage('Reservation Updated Successfully');
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
