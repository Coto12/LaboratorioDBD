<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::all();
        if($countries->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran paises'
            ]);
        }
        return response($countries, 200);
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
                'country_name' => 'required|min:2'
            ],
            [
                'country_name.required' => 'Debes ingresar un nombre',
                'country_name.min' => 'El nombre de pais debe tener un minimo de 2 caracteres'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros());
        }
        $newCountry = new Country();
        $newCountry->country_name = $request->country_name;
        $newCountry->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo pais con el id:',
            'id' => $newCountry->id
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
        $country = Country::find($id);
        if (empty($country)){
            return response()->json([]);
        }
        return response($country, 200);
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
                'country_name' => 'required|min:2'
            ],
            [
                'country_name.required' => 'Debes ingresar un nombre',
                'country_name.min' => 'El nombre de pais debe tener un minimo de 2 caracteres'
            ]
        );
        if ($validator->fails()) {
            return response($validator->erros());
        }
        $country = Country::find($id);
        if(empty($country)){
            return response()->json([]);
        }
        $country->country_name = $request->country_name;
        $country->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el pais con el id:',
            'id' => $country->id
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
        $country = Country::find($id);
        if(empty($country)){
            return response()->json([]);
        }
        $country->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el pais',
            'id' => $country->id
        ], 200);
    }
}
