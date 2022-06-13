<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use Illuminate\Support\Facades\Validator;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $playlists = Playlist::all();
        if($playlists->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran playlists'
            ]);
        }
        return response($playlists, 200);
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
                'playlist_name' => 'required|min:2',
                'playlist_description' => 'required',
                'id_user' => 'required'
            ],
            [
                'playlist_name.required' => 'Debes ingresar un nombre para tu playlist',
                'playlist_name.min' => 'El nombre de la playlist debe tener un minimo de 2 letras',
                'playlist_description.required' => 'Debes ingresar una descripcion para tu playlist',
                'id_user.required' => 'Debes ingresar un id de usuario'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $newPlaylist = new Playlist();
        $newPlaylist->playlist_name = $request->playlist_name;
        $newPlaylist->playlist_description = $request->playlist_description;
        $newPlaylist->id_user = $request->id_country;
        $newPlaylist->save();

        return response()->json([
            'respuesta' => 'Se ha creado una nueva playlist con el id:',
            'id' => $newPlaylist->id
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
        $playlist = Playlist::find($id);
        if (empty($playlist)){
            return response()->json([]);
        }
        return response($playlist, 200);
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
                'playlist_name' => 'required|min:2',
                'playlist_description' => 'required',
                'id_user' => 'required'
            ],
            [
                'playlist_name.required' => 'Debes ingresar un nombre para tu playlist',
                'playlist_name.min' => 'El nombre de la playlist debe tener un minimo de 2 letras',
                'playlist_description.required' => 'Debes ingresar una descripcion para tu playlist',
                'id_user.required' => 'Debes ingresar un id de usuario'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json([]);
        }
        $playlist->playlist_name = $request->playlist_name;
        $playlist->playlist_description = $request->playlist_description;
        $playlist->id_user = $request->id_country;
        $playlist->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la playlist con el id:',
            'id' => $playlist->id
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
        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json([]);
        }
        $playlist->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado la playlist',
            'id' => $playlist->id
        ], 200);
    }
}
