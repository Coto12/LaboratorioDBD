<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paymentMethod = PaymentMethod::all();
        if($paymentMethod->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran usuarios'
            ]);
        }
        return response($paymentMethod, 200);
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
        $validator = Validator::make(
            $request->all(),[
                'credit_card' => 'required',
                'transaction_number' => 'required',
                'id_user' => 'required'
            ],
            [
                'credit_card.required' => 'Debes ingresar una tarjeta de credito',
                'transaction_number.required' => 'Debes ingresar un numero de transaccion',
                'id_user.required' => 'Debes ingresar un nombre de usuario',
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $newPaymentMethod = new PaymentMethod();        
        $newPaymentMethod->credit_card = $request->credit_card;
        $newPaymentMethod->transaction_number = $request->transaction_number;
        $newPaymentMethod->id_user = $request->id_user;
        $newPaymentMethod->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo usuario con el id:',
            'id' => $newPaymentMethod->id
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
        $paymentMethod = PaymentMethod::find($id);
        if (empty($paymentMethod)){
            return response()->json([]);
        }
        return response($paymentMethod, 200);
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
                'credit_card' => 'required',
                'transaction_number' => 'required',
                'id_user' => 'required'
            ],
            [
                'credit_card.required' => 'Debes ingresar una tarjeta de credito',
                'transaction_number.required' => 'Debes ingresar un numero de transaccion',
                'id_user.required' => 'Debes ingresar un nombre de usuario',
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $paymentMethod = PaymentMethod::find($id);
        if(empty($paymentMethod)){
            return response()->json([]);
        }
        $paymentMethod->credit_card = $request->credit_card;
        $paymentMethod->transaction_number = $request->transaction_number;
        $paymentMethod->id_user = $request->id_user;
        $paymentMethod->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el metodo de pago con el id:',
            'id' => $paymentMethod->id
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
        $paymentMethod = PaymentMethod::find($id);
        if(empty($paymentMethod)){
            return response()->json([]);
        }
        $paymentMethod->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el metodo de pago',
            'id' => $paymentMethod->id
        ], 200);
    }
}
