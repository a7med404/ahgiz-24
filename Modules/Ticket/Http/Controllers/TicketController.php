<?php

namespace Modules\Ticket\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ticket\Entities\Ticket;
use Illuminate\Routing\Controller;
use Yajra\DataTables\DataTables;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        // $ticket = Ticket::all();
        //dd($ticket);
        return view('ticket::ticket.index');
    }
    public function ticketDataTables()
    {
        // dd(88);
        return DataTables::of(Ticket::orderBy('id', 'desc')->get())
            ->addColumn('options', function ($ticket) {
                return view('ticket::ticket.colums.options', ['id' => $ticket->id, 'routeName' => 'tickets']);
            })
            // // ->editColumn('type', function ($ticket) {
            // //     return $ticket->type == 0 ? '<span class="label label-light-warning">' . ticketType()[$ticket->type] . '</span>' : '<span class="label label-light-success">' . ticketType()[$ticket->type] . '</span>';
            // // })
            // // ->editColumn('ticket', function ($ticket) {
            // //     return getName('tickets', $ticket->ticket_number);
            // // })
            ->rawColumns(['options'])
            // ->removeColumn('reservation_id')
            ->setRowId('{{$id}}')
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('ticket::create');
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
        return view('ticket::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('ticket::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
