<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        if($users->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran usuarios'
            ]);
        }
        return response($users, 200);
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
                'email' => 'required',
                'name' => 'required|min:2',
                'password' => 'required|min:8',
                'birth_date' => 'required',
            ],
            [
                'email.required' => 'Debes ingresar un email',
                'name.required' => 'Debes ingresar un nombre',
                'name.min' => 'El nombre de usuario debe tener un minimo de :min',
                'password.required' => 'Debes ingresar una contraseña',
                'password.min' => 'La contraseña debe tener un minimo de 8 caracteres',
                'birth_date' => 'Debes ingresar una fecha de cumpleaños con el formato: AAAA-MM-DD',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newUser = new User();
        $newUser->email = $request->email;
        $newUser->name = $request->name;
        $newUser->password = $request->password;
        $newUser->birth_date = $request->birth_date;
        $newUser->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo usuario con el id:',
            'id' => $newUser->id
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
        $user = User::find($id);
        if (empty($user)){
            return response()->json([]);
        }
        return response($user, 200);
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
                'email' => 'required',
                'name' => 'required|min:2',
                'password' => 'required|min:8',
                'birth_date' => 'required',
            ],
            [
                'email.required' => 'Debes ingresar un email',
                'name.required' => 'Debes ingresar un nombre',
                'name.min' => 'El nombre de usuario debe tener un minimo de 2 caracteres',
                'password.required' => 'Debes ingresar una contraseña',
                'password.min' => 'La contraseña debe tener un minimo de 8 caracteres',
                'birth_date' => 'Debes ingresar una fecha de cumpleaños con el formato: AAAA-MM-DD',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $user = User::find($id);
        if(empty($user)){
            return response()->json([]);
        }
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->birth_date = $request->birth_date;
        $user->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el usuario con el id:',
            'id' => $user->id
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
        $user = User::find($id);
        if(empty($user)){
            return response()->json([]);
        }
        $user->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado un usuario',
            'id' => $user->id
        ], 200);
    }
}