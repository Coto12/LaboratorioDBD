<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Validator;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $songs = Song::all();
        if($songs->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran canciones'
            ]);
        }
        return response($songs, 200);
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
                'song_name' => 'required|min:2',
                'age_restriction' => 'required',
                'image' => 'required',
                'lyrics' => 'required',
                'id_country' => 'required'
            ],
            [
                'song_name.required' => 'Debes ingresar un nombre para tu cancion',
                'song_name.min' => 'El nombre de la cancion debe tener un minimo de 2 letras',
                'age_restriction.required' => 'Debes ingresar una restriccion de edad',
                'image.required' => 'Debes ingresar un texto',
                'lyrics.required' => 'Debes ingresar la letra de tu cancion',
                'id_country.required' => 'Debes ingresar un pais de origen'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $newSong = new Song();
        $newSong->song_name = $request->song_name;
        $newSong->age_restriction = $request->age_restriction;
        $newSong->image = $request->image;
        $newSong->lyrics = $request->lyrics;
        $newSong->id_country = $request->id_country;
        $newSong->save();

        return response()->json([
            'respuesta' => 'Se ha creado una nueva cancion con el id:',
            'id' => $newSong->id
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
        $song = Song::find($id);
        if (empty($song)){
            return response()->json([]);
        }
        return response($song, 200);
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
                'song_name' => 'required|min:2',
                'age_restriction' => 'required',
                'image' => 'required',
                'lyrics' => 'required',
                'id_country' => 'required'
            ],
            [
                'song_name.required' => 'Debes ingresar un nombre para tu cancion',
                'song_name.min' => 'El nombre de la cancion debe tener un minimo de 2 letras',
                'age_restriction.required' => 'Debes ingresar una restriccion de edad',
                'image.required' => 'Debes ingresar un texto',
                'lyrics.required' => 'Debes ingresar la letra de tu cancion',
                'id_country.required' => 'Debes ingresar un pais de origen'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $song = Song::find($id);
        if(empty($song)){
            return response()->json([]);
        }
        $song->song_name = $request->song_name;
        $song->age_restriction = $request->age_restriction;
        $song->image = $request->image;
        $song->lyrics = $request->lyrics;
        $song->id_country = $request->id_country;
        $song->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la cancion con el id:',
            'id' => $song->id
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
        $song = Song::find($id);
        if(empty($song)){
            return response()->json([]);
        }
        $song->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado la cancion',
            'id' => $song->id
        ], 200);
    }
}
