<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenreSong;
use Illuminate\Support\Facades\Validator;

class GenreSongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $genreSongs = GenreSong::all();
        if($genreSongs->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran generos'
            ]);
        }
        return response($genreSongs, 200);
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
                'genre_song_name' => 'required|min:2',
                'id_song' => 'required',
                'id_genre' => 'required'
            ],
            [
                'genre_song_name.required' => 'Debes ingresar un nombre para tu generoCancion',
                'genre_song_name.min' => 'El nombre del generoCancion debe tener un minimo de 2 letras',
                'id_song.required' => 'Debes ingresar un de cancion',
                'id_genre.required' => 'Debes ingresar un de genero'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $newGenreSong = new GenreSong();
        $newGenreSong->genre_song_name = $request->genre_song_name;
        $newGenreSong->id_song = $request->id_song;
        $newGenreSong->id_genre = $request->id_genre;
        $newGenreSong->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo generoCancion con el id:',
            'id' => $newGenreSong->id
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
        $genreSong = GenreSong::find($id);
        if (empty($genreSong)){
            return response()->json([]);
        }
        return response($genreSong, 200);
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
                'genre_song_name' => 'required|min:2',
                'id_song' => 'required',
                'id_genre' => 'required'
            ],
            [
                'genre_song_name.required' => 'Debes ingresar un nombre para tu generoCancion',
                'genre_song_name.min' => 'El nombre del generoCancion debe tener un minimo de 2 letras',
                'id_song.required' => 'Debes ingresar un de cancion',
                'id_genre.required' => 'Debes ingresar un de genero'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $genreSong = GenreSong::find($id);
        if(empty($genreSong)){
            return response()->json([]);
        }
        $genreSong->genre_song_name = $request->genre_song_name;
        $genreSong->id_song = $request->id_song;
        $genreSong->id_genre = $request->id_genre;
        $genreSong->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el generoCancion con el id:',
            'id' => $genreSong->id
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
        $genreSong = GenreSong::find($id);
        if(empty($genreSong)){
            return response()->json([]);
        }
        $genreSong->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el generoCancion',
            'id' => $genreSong->id
        ], 200);
    }
}
