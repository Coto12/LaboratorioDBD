<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interaction;
use Illuminate\Support\Facades\Validator;

class InteractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $interactions = Interaction::all();
        if($interactions->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran usuarios'
            ]);
        }
        return response($interactions, 200);
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
                'views' => 'required',
                'isliked' => 'required',
                'favs' => 'required',
                'rated' => 'required',
                'id_user' => 'required',
                'id_song' => 'required'
            ],
            [
                'views.required' => 'Debes ingresar un numero de views',
                'isliked.required' => 'Debes ingresar si le ha dado like o no en booleano',
                'favs.required' => 'Debes ingresar si esta en favoritos o no en booleano',
                'rated.required' => 'Debes ingresar si ha punteado la cancion',
                'id_user.required' => 'Debes ingresar un id de usuario',
                'id_song.required' => 'Debes ingresar un id de cancion'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $newInteraction = new Interaction();
        $newInteraction->views = $request->views;
        $newInteraction->isliked = $request->isliked;
        $newInteraction->favs = $request->favs;
        $newInteraction->rated = $request->rated;
        $newInteraction->id_user = $request->id_user;
        $newInteraction->id_song = $request->id_song;
        $newInteraction->save();

        return response()->json([
            'respuesta' => 'Se ha creado una nueva interaccion con el id:',
            'id' => $newInteraction->id
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
        $interactions = Interaction::find($id);
        if (empty($interactions)){
            return response()->json([]);
        }
        return response($interactions, 200);
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
                'views' => 'required',
                'isliked' => 'required',
                'favs' => 'required',
                'rated' => 'required',
                'id_user' => 'required',
                'id_song' => 'required'
            ],
            [
                'views.required' => 'Debes ingresar un numero de views',
                'isliked.required' => 'Debes ingresar si le ha dado like o no en booleano',
                'favs.required' => 'Debes ingresar si esta en favoritos o no en booleano',
                'rated.required' => 'Debes ingresar si ha punteado la cancion',
                'id_user.required' => 'Debes ingresar un id de usuario',
                'id_song.required' => 'Debes ingresar un id de cancion'
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $interaction = Interaction::find($id);
        if(empty($interaction)){
            return response()->json([]);
        }
        $interaction->views = $request->views;
        $interaction->isliked = $request->isliked;
        $interaction->favs = $request->favs;
        $interaction->rated = $request->rated;
        $interaction->id_user = $request->id_user;
        $interaction->id_song = $request->id_song;
        $interaction->save();
        return response()->json([
            'respuesta' => 'Se ha modificado la interacciion con el id:',
            'id' => $interaction->id
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
        $interaction = Interaction::find($id);
        if(empty($interaction)){
            return response()->json([]);
        }
        $interaction->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado una interaccion',
            'id' => $interaction->id
        ], 200);
    }
}
