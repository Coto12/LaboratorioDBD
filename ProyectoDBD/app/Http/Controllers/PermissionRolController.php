<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermissionRol;
use Illuminate\Support\Facades\Validator;

class PermissionRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissionRol = PermissionRol::all();
        if($permissionRol->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran rolUsuarios'
            ]);
        }
        return response($permissionRol, 200);
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
                'id_permission' => 'required',
                'id_rol' => 'required'
            ],
            [
                'id_permission.required' => 'Debes ingresar un id de permiso',
                'id_rol.required' => 'Debes ingresar un id de rol'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $newPermissionRol = new PermissionRol();
        $newPermissionRol->id_permission = $request->id_permission;
        $newPermissionRol->id_rol = $request->id_rol;
        $newPermissionRol->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo rolUsuario con el id:',
            'id' => $newPermissionRol->id
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
        $permissionRol = PermissionRol::find($id);
        if (empty($permissionRol)){
            return response()->json([]);
        }
        return response($permissionRol, 200);
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
                'id_permission' => 'required',
                'id_rol' => 'required'
            ],
            [
                'id_permission.required' => 'Debes ingresar un id de usuario',
                'id_rol.required' => 'Debes ingresar un id de rol'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $permissionRol = PermissionRol::find($id);
        if(empty($permissionRol)){
            return response()->json([]);
        }
        $permissionRol->id_permission = $request->id_permission;
        $permissionRol->id_rol = $request->id_rol;
        $permissionRol->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el rolUsuario con el id:',
            'id' => $permissionRol->id
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
        $permissionRol = PermissionRol::find($id);
        if(empty($permissionRol)){
            return response()->json([]);
        }
        $permissionRol->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el PermisoUsuario',
            'id' => $permissionRol->id
        ], 200);
    }
}
