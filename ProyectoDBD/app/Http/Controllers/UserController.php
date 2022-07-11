<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follow;
use App\Models\Role;
use App\Models\RolUser;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function perfil(){
        $users=User::get();
        $roles=Role::get();
        $follows=Follow::get();
        $rols_users=RolUser::get();
        return view('nav',['follows'=>$follows,'users'=>$users,'roles'=>$roles, 'rols_users'=>$rols_users]);
    }

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


    public function createUser()
    {
        $UserRequest = new \Illuminate\Http\Request();
        $UserRequest->request->add(['name' =>$request->name]);
        $UserRequest->request->add(['email' =>$request->email]);
        $UserRequest->request->add(['password' =>$request->password]);
        $UserRequest->request->add(['birth_date' =>$request->birth_date]);

        app('App\Http\Controllers\UserController')->store($UserRequest);
        return redirect('/login');
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
        //z
        $validator = Validator::make(
            $request->all(),[
                'email' => 'required',
                'name' => 'required|min:2',
                'password' => 'required|min:8',
                'birth_date' => 'required'
            ],
            [
                'email.required' => 'Debes ingresar un email',
                'name.required' => 'Debes ingresar un nombre',
                'name.min' => 'El nombre de usuario debe tener un minimo de :min',
                'password.required' => 'Debes ingresar una contraseña',
                'password.min' => 'La contraseña debe tener un minimo de 8 caracteres',
                'birth_date' => 'Debes ingresar una fecha de cumpleaños con el formato: AAAA-MM-DD'
            ]
        );

        $validator->validate();

        if ($validator->fails()) {
            return response($validator->errors());
        }
        $newUser = new User();
        $newUser->email = $request->email;
        $newUser->name = $request->name;
        $newUser->password = bcrypt($request->password);
        $newUser->birth_date = $request->birth_date;
        $newUser->save();

        return redirect('/login');
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


    public function updateUser(Request $request, $id)
    {
        $updateRequest = new \Illuminate\Http\Request();
        $updateRequest->setMethod('POST');
        $updateRequest->request->add(['name' =>$request->name]);

        app('App\Http\Controllers\UserController')->update($UserRequest, $id);
        return redirect('/dashboard');
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
                'name' => 'required|min:2'
            ],
            [
                'name.required' => 'Debes ingresar un nombre',
                'name.min' => 'El nombre de usuario debe tener un minimo de 2 caracteres',
            ]
        );
        if ($validator->fails()) {
            return response($validator->errors());
        }
        $user = User::find($id);
        if(empty($user)){
            return response()->json([]);
        }
        $user->name = $request->name;
        $user->save();
        return redirect('/dashboard');
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