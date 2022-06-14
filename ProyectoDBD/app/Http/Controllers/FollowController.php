<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Validator;

class FollowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $follows = Follow::all();
        if($follows->isEmpty()){
            return response()->json([
                'respuesta' => 'No se encuentran seguimiento entre usuarios'
            ]);
        }
        return response($follows, 200);
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
                'id_follower' => 'required',
                'id_following' => 'required'
            ],
            [
                'id_follower.required' => 'Debes ingresar un id follower',
                'id_following.required' => 'Debes ingresar un id following',
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $newFollow = new Follow();
        $newFollow->id_follower = $request->id_follower;
        $newFollow->id_following = $request->id_following;
        $newFollow->save();

        return response()->json([
            'respuesta' => 'Se ha creado un nuevo seguimiento entre usuarios con el id:',
            'id' => $newFollow->id
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
        $follow = Follow::find($id);
        if (empty($follow)){
            return response()->json([]);
        }
        return response($follow, 200);
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
                'id_follower' => 'required',
                'id_following' => 'required'
            ],
            [
                'id_follower.required' => 'Debes ingresar un id follower',
                'id_following.required' => 'Debes ingresar un id following',
            ]
            );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $follow = Follow::find($id);
        if(empty($follow)){
            return response()->json([]);
        }
        $follow->id_follower = $request->id_follower;
        $follow->id_following = $request->id_following;
        $follow->save();
        return response()->json([
            'respuesta' => 'Se ha modificado el seguimiento de usuarios con el id:',
            'id' => $follow->id
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
        $follow = Follow::find($id);
        if(empty($follow)){
            return response()->json([]);
        }
        $follow->delete();

        return response()->json([
            'respuesta' => 'Se ha eliminado un seguimiento de usuarios',
            'id' => $follow->id
        ], 200);
    }
}
