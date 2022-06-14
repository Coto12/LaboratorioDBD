<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        if($roles->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran roles'
            ]);
        }
        return response($roles, 200);
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
                'role_type' => 'required|min:2',
            ],
            [
                'role_type.required' => 'Debes ingresar un nombre',
                'role_type.min' => 'El nombre del rol debe tener un minimo de 2 caracteres',
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $newRole = new Role();
        $newRole->role_type = $request->role_type;
        $newRole->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo rol con el id:',
            'id' => $newRole->id
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
        $role = Role::find($id);
        if (empty($role)){
            return response()->json([]);
        }
        return response($role, 200);
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
                'role_type' => 'required|min:2',
            ],
            [
                'role_type.required' => 'Debes ingresar un nombre',
                'role_type.min' => 'El nombre del rol debe tener un minimo de 2 caracteres',
            ]
            );

            if ($validator->fails()) {
                return response($validator->errors());
            }
            $role = Role::find($id);
            if(empty($role)){
                return response()->json([]);
            }
            $role->role_type = $request->role_type;
            $role->save();
            return response()->json([
                'respuesta' => 'Se ha modificado el usuario con el id:',
                'id' => $role->id
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
        $role = Role::find($id);
        if(empty($role)){
            return response()->json([]);
        }
        $role->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado un rol',
            'id' => $role->id
        ], 200);
    }
}
