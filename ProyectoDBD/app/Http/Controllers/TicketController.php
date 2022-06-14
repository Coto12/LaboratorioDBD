<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tickets = Ticket::all();
        if($tickets->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran boletas'
            ]);
        }
        return response($tickets, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $validator = Validator::make(
            $request->all(),[
                'date' => 'required',
                'amount' => 'required',
                'id_subscription' => 'required',
                'id_payment_method' => 'required'

            ],
            [
                'date.required' => 'Debes ingresar un date',
                'amount.required' => 'Debes ingresar un nombre',
                'id_subscription.required' => 'Debes ingresar un id de suscripcion',
                'id_payment_method.required' => 'Debes ingresar un id de metodo de pago'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $newTicket = new Ticket();
        $newTicket->date = $request->date;
        $newTicket->amount = $request->amount;
        $newTicket->id_subscription = $request->id_subscription;
        $newTicket->id_payment_method = $request->id_payment_method;
        $newTicket->save();

        return response()->json([
            'respuesta' => 'Se ha creado una nueva boleta con el id:',
            'id' => $newTicket->id
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $ticket = Ticket::find($id);
        if (empty($ticket)){
            return response()->json([]);
        }
        return response($ticket, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make(
            $request->all(),[
                'date' => 'required',
                'amount' => 'required',
                'id_subscription' => 'required',
                'id_payment_method' => 'required'

            ],
            [
                'date.required' => 'Debes ingresar un date',
                'amount.required' => 'Debes ingresar un nombre',
                'id_subscription.required' => 'Debes ingresar un id de suscripcion',
                'id_payment_method.required' => 'Debes ingresar un id de metodo de pago'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $ticket = Ticket::find($id);
        if(empty($ticket)){
            return response()->json([]);
        }
        $ticket->date = $request->date;
        $ticket->amount = $request->amount;
        $ticket->id_subscription = $request->id_subscription;
        $ticket->id_payment_method = $request->id_payment_method;
        $ticket->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la boleta con el id:',
            'id' => $ticket->id
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ticket = Ticket::find($id);
        if(empty($ticket)){
            return response()->json([]);
        }
        $ticket->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado la boleta',
            'id' => $ticket->id
        ], 200);
    }
}
