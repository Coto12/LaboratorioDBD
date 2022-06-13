<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::all();
        if($cities->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran ciudades'
            ]);
        }
        return response($cities, 200);
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
                'city_name' => 'required|min:2',
                'id_country' => 'required',
            ],
            [
                'city_name.required' => 'Debes ingresar un nombre para tu ciudad',
                'city_name.min' => 'El nombre de la ciudad debe tener un minimo de 2 letras',
                'id_country.required' => 'Debes ingresar un id ciudad'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $newCity = new City();
        $newCity->city_name = $request->city_name;
        $newCity->id_country = $request->id_country;
        $newCity->save();

        return response()->json([
            'respuesta' => 'Se ha creado una nueva ciudad con el id:',
            'id' => $newCity->id
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
        $city = City::find($id);
        if (empty($city)){
            return response()->json([]);
        }
        return response($city, 200);
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
                'city_name' => 'required|min:2',
                'id_country' => 'required',
            ],
            [
                'city_name.required' => 'Debes ingresar un nombre para tu ciudad',
                'city_name.min' => 'El nombre del a ciudad debe tener un minimo de 2 letras',
                'id_country.required' => 'Debes ingresar un id ciudad'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $city = City::find($id);
        if(empty($city)){
            return response()->json([]);
        }
        $city->city_name = $request->city_name;
        $city->id_country = $request->id_country;
        $city->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la ciudad con el id:',
            'id' => $city->id
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
        $city = City::find($id);
        if(empty($city)){
            return response()->json([]);
        }
        $city->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado la ciudad',
            'id' => $city->id
        ], 200);
    }
}
