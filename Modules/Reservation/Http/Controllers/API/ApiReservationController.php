<?php

namespace Modules\Reservation\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Reservation\Entities\Reservation;
use Modules\Reservation\Transformers\ReservationResource;
use Modules\Reservation\Transformers\SingleReservationResource;

class ApiReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return ReservationResource::collection($reservations);
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
    public function store(Request $request)
    {
        Reservation::create($request->all());    
        return response()->json(['message' => 'تم الحفظ بنجاح'], 201);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return new SingleReservationResource(Reservation::findOrfail($id));
        /* return view('reservation::show'); */
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return Reservation::with('addresses')->with('contacts')->with('identifcations')->with('health')->findOrfail($id);
        /* return view('reservation::edit'); */
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CreateReservationRequest $request, $id)
    {
        Reservation::findOrfail($id)->update($request->all());
        return response()->json([
                'message' => 'تم التحديث بنجاح',
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    { 
        Reservation::findOrfail($id)->delete();
        return response()->json([
                'message' => 'تم الحذف بنجاح',
            ], 200);
    }

    public function allReservations(Request $request)
    {
        if($request->has('gender')){
            $requestAll = $request->toArray();
            $query = DB::table('reservations')->select('*');
            foreach ($requestAll as $key => $req) {
                if (!($req == "" || null)) {
                    $query->where($key, $req);
                }
            }
            $reservations = $query->orderBy('id','desc')->get();
            return ReservationResource::collection($reservations);
        }
            return ReservationResource::collection(Reservation::all());
    }
}
