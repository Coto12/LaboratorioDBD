<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SongPlaylist;
use Illuminate\Support\Facades\Validator;

class SongPlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $songPlaylists = SongPlaylist::all();
        if($songPlaylists->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran datos'
            ]);
        }
        return response($songPlaylists, 200);
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
                'id_song' => 'required',
                'id_playlist' => 'required'
            ],
            [
                'id_song.required' => 'Debes ingresar un id de una cancion',
                'id_playlist.required' => 'Debes ingresar un id de playlist'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $newSongPlaylist = new SongPlaylist();
        $newSongPlaylist->id_song = $request->id_song;
        $newSongPlaylist->id_playlist = $request->id_playlist;
        $newSongPlaylist->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo dato SongPlaylist con el id:',
            'id' => $newSongPlaylist->id
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
        $songPlaylist = SongPlaylist::find($id);
        if (empty($songPlaylist)){
            return response()->json([]);
        }
        return response($songPlaylist, 200);
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
                'id_song' => 'required',
                'id_playlist' => 'required'
            ],
            [
                'id_song.required' => 'Debes ingresar un id de una cancion',
                'id_playlist.required' => 'Debes ingresar un id de playlist'
            ]
            );
        if ($validator->fails()) {
            return response($validator->erros(), 400);
        }
        $songPlaylist = SongPlaylist::find($id);
        if(empty($songPlaylist)){
            return response()->json([]);
        }
        $songPlaylist->id_song = $request->id_song;
        $songPlaylist->id_playlist = $request->id_playlist;
        $songPlaylist->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el dato SongPlaylist con el id:',
            'id' => $songPlaylist->id
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
        $songPlaylist = SongPlaylist::find($id);
        if(empty($songPlaylist)){
            return response()->json([]);
        }
        $songPlaylist->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado el dato SongPlaylist con el id:',
            'id' => $songPlaylist->id
        ], 200);
    }
}
