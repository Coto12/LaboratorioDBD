<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        if($permissions->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran permisos'
            ]);
        }
        return response($permissions, 200);
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
                'permit_type' => 'required|min:2'
            ],
            [
                'permit_type.required' => 'Debes ingresar un nombre',
                'permit_type.min' => 'El nombre del permiso debe tener un minimo de 2 caracteres'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $newPermission = new Permission();
        $newPermission->permit_type = $request->permit_type;
        $newPermission->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo usuario con el id:',
            'id' => $newPermission->id
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
        $permission = Permission::find($id);
        if (empty($permission)){
            return response()->json([]);
        }
        return response($permission, 200);
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
                'permit_type' => 'required|min:2'
            ],
            [
                'permit_type.required' => 'Debes ingresar un nombre',
                'permit_type.min' => 'El nombre de permiso debe tener un minimo de 2 caracteres',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $permission = Permission::find($id);
        if(empty($permission)){
            return response()->json([]);
        }
        $permission->permit_type = $request->permit_type;
        $permission->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el permiso con el id:',
            'id' => $permission->id
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
        $permission = Permission::find($id);
        if(empty($permission)){
            return response()->json([]);
        }
        $permission->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el permiso',
            'id' => $permission->id
        ], 200);
    }
}
