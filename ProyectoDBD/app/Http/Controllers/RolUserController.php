<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolUser;
use Illuminate\Support\Facades\Validator;

class RolUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rolUser = RolUser::all();
        if($rolUser->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran rolUsuarios'
            ]);
        }
        return response($rolUser, 200);
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
                'id_user' => 'required',
                'id_rol' => 'required'
            ],
            [
                'id_user.required' => 'Debes ingresar un id de usuario',
                'id_rol.required' => 'Debes ingresar un id de rol'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $newRolUser = new RolUser();
        $newRolUser->id_user = $request->id_user;
        $newRolUser->id_rol = $request->id_rol;
        $newRolUser->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo rolUsuario con el id:',
            'id' => $newRolUser->id
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
        $rolUser = RolUser::find($id);
        if (empty($rolUser)){
            return response()->json([]);
        }
        return response($rolUser, 200);
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
                'id_user' => 'required',
                'id_rol' => 'required'
            ],
            [
                'id_user.required' => 'Debes ingresar un id de usuario',
                'id_rol.required' => 'Debes ingresar un id de rol'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $rolUser = RolUser::find($id);
        if(empty($rolUser)){
            return response()->json([]);
        }
        $rolUser->id_user = $request->id_user;
        $rolUser->id_rol = $request->id_rol;
        $rolUser->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el rolUsuario con el id:',
            'id' => $rolUser->id
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
        $rolUser = RolUser::find($id);
        if(empty($rolUser)){
            return response()->json([]);
        }
        $rolUser->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el RolUsuario',
            'id' => $rolUser->id
        ], 200);
    }
}
