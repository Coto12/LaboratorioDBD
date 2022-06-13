<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityUser;
use Illuminate\Support\Facades\Validator;

class CityUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cityUser = CityUser::all();
        if($cityUser->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran datos en CityUser'
            ]);
        }
        return response($cityUser, 200);
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
                'zip_code' => 'required',
                'id_city' => 'required',
                'id_user' => 'required'
            ],
            [
                'zip_code.required' => 'Debes ingresar un codigo postal',
                'id_city.required' => 'Debes ingresar un id ciudad',
                'id_user.required' => 'Debes ingresar un id usuario'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $newCityUser = new CityUser();
        $newCityUser->zip_code = $request->zip_code;
        $newCityUser->id_city = $request->id_city;
        $newCityUser->id_user = $request->id_user;
        $newCityUser->save();

        return response()->json([
            'respuesta' => 'Se ha creado una nueva ciudadUsuario con el id:',
            'id' => $newCityUser->id
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
        $cityUser = CityUser::find($id);
        if (empty($cityUser)){
            return response()->json([]);
        }
        return response($cityUser, 200);
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
                'zip_code' => 'required',
                'id_city' => 'required',
                'id_user' => 'required'
            ],
            [
                'zip_code.required' => 'Debes ingresar un codigo postal',
                'id_city.required' => 'Debes ingresar un id ciudad',
                'id_user.required' => 'Debes ingresar un id usuario'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $cityUser = CityUser::find($id);
        if(empty($cityUser)){
            return response()->json([]);
        }
        $cityUser->zip_code = $request->zip_code;
        $cityUser->id_city = $request->id_city;
        $cityUser->id_user = $request->id_user;
        $cityUser->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la ciudadUsuario con el id:',
            'id' => $cityUser->id
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
        $cityUser = CityUser::find($id);
        if(empty($cityUser)){
            return response()->json([]);
        }
        $cityUser->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado la cancion',
            'id' => $cityUser->id
        ], 200);
    }
}
