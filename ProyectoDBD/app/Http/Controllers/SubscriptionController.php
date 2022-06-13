<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subscription = Subscription::all();
        if($subscription->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran suscripciones'
            ]);
        }
        return response($subscription, 200);
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
                'amount' => 'required',
                'date' => 'required',
                'verification' => 'required',
                'id_user' => 'required',
                'id_payment_method' => 'required'
            ],
            [
                'amount.required' => 'Debes ingresar un monto',
                'date.required' => 'Debes ingresar una hora',
                'verification.required' => 'Debes ingresar una verificacion',
                'id_user.required' => 'Debes ingresar un id de usuario',
                'id_payment_method.required' => 'Debes ingresar un id de metodo de pago'

            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $newSubscription = new Subscription();
        $newSubscription->amount = $request->amount;
        $newSubscription->date = $request->date;
        $newSubscription->verification = $request->verification;
        $newSubscription->id_user = $request->id_user;
        $newSubscription->id_payment_method = $request->id_payment_method;
        $newSubscription->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo usuario con el id:',
            'id' => $newSubscription->id
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
        $subscription = Subscription::find($id);
        if (empty($subscription)){
            return response()->json([]);
        }
        return response($subscription, 200);
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
                'amount' => 'required',
                'date' => 'required',
                'verification' => 'required',
                'id_user' => 'required',
                'id_payment_method' => 'required'
            ],
            [
                'amount.required' => 'Debes ingresar un monto',
                'date.required' => 'Debes ingresar una hora',
                'verification.required' => 'Debes ingresar una verificacion',
                'id_user.required' => 'Debes ingresar un id de usuario',
                'id_payment_method.required' => 'Debes ingresar un id de metodo de pago'

            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $subscription = Subscription::find($id);
        if(empty($subscription)){
            return response()->json([]);
        }
        $subscription->amount = $request->amount;
        $subscription->date = $request->date;
        $subscription->verification = $request->verification;
        $subscription->id_user = $request->id_user;
        $subscription->id_payment_method = $request->id_payment_method;
        $subscription->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la suscripcion con el id:',
            'id' => $subscription->id
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
        $subscription = Subscription::find($id);
        if(empty($subscription)){
            return response()->json([]);
        }
        $subscription->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado la suscripcion',
            'id' => $subscription->id
        ], 200);
    }
}
