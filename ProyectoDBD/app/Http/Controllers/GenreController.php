<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $genres = Genre::all();
        if($genres->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran generos'
            ]);
        }
        return response($genres, 200);
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
                'genre_name' => 'required|min:2',
                'genre_description' => 'required'
            ],
            [
                'genre_name.required' => 'Debes ingresar un nombre para tu genero',
                'genre_name.min' => 'El nombre del genero debe tener un minimo de 2 letras',
                'genre_description.required' => 'Debes ingresar una descripcion para el genero',
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $newGenre = new Genre();
        $newGenre->genre_name = $request->genre_name;
        $newGenre->genre_description = $request->genre_description;
        $newGenre->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo genero con el id:',
            'id' => $newGenre->id
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
        $genre = Genre::find($id);
        if (empty($genre)){
            return response()->json([]);
        }
        return response($genre, 200);
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
                'genre_name' => 'required|min:2',
                'genre_description' => 'required'
            ],
            [
                'genre_name.required' => 'Debes ingresar un nombre para tu genero',
                'genre_name.min' => 'El nombre del genero debe tener un minimo de 2 letras',
                'genre_description.required' => 'Debes ingresar una descripcion para el genero',
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $genre = Genre::find($id);
        if(empty($genre)){
            return response()->json([]);
        }
        $genre->genre_name = $request->genre_name;
        $genre->genre_description = $request->genre_description;
        $genre->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el genero con el id:',
            'id' => $genre->id
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
        $genre = Genre::find($id);
        if(empty($genre)){
            return response()->json([]);
        }
        $genre->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el genero',
            'id' => $genre->id
        ], 200);
    }
}
