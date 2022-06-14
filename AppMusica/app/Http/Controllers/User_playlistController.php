<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User_playlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Users_playlist = User_playlist::all();
        if(Users_playlist->isEmpty()){
            return response()->json(['message'=> 'No Users_playlist found'], 404);
        }
        return response($Users_playlist);

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
        $newUserPlay = new User_playlist();

        $validator = Validator::make(
            $request->all(), [
                'id_user' => 'required|integer',
                'id_playlist' => 'required|integer'
            ]

            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $user = User::find($request->id_user);
        $playlist = Playlist::find($request->id_playlist);

        if($user == NULL){
            return response()->json([
                'respuesta' => 'id de usuario invalido'
            ]);
        }else if($playlist == NULL){
            return response()->json([
                'respuesta' => 'id de playlist invalido'
            ]);
        }else{
            $newUserPlay->id_user = $require->id_user;
            $newUserPlay->id_playlist = $require->id_playlist;
            $newUserPlay->save();
            return response()->json([
                'respuesta' => 'Nueva intersección user_playlist creada',
                'id' => $newUserPlay->id_user_playlist,
            ], 201);
        }
    }

    public function archive()
    {
        //
        $users_playlist = User_playlist::onlyTrashed()->get();
        if ($users_playlist->isEmpty()) {
            return response()->json(['message' => 'No archived user_playlist found'], 404);
        }
        return response($users_playlist, 200);
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
        $user_playlist = User_playlist::find($id);
        if(empty($user_playlist)){
            return response()->json([]);
        }
        return response($user_playlist, 200);
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
        $user_playlist = User_playlist::find($id);
        $validator = Validator::make(
            $request->all(),[
                'id_user' => 'required|integer',
                'id_playlist' => 'required|integer'
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($user_playlist == NULL){
            return response()->json([
                'respuesta' => 'id de usuario_playlist invalido'
            ]);
        }

        $user = User::find($request->id_user);
        $playlist = Playlist::find($request->id_playlist);
        if($user == NULL){
            return response()->json([
                'respuesta' => 'id de usuario invalido'
            ]);
        }else if($playlist == NULL){
            return response()->json([
                'respuesta' => 'id de playlist invalido'
            ]);
        }

        $user_playlist->id_user = $request->id_user;
        $user_playlist->id_playlist = $request->id_playlist;
        $user_playlist->save();
        return response()->json([
            'respuesta' => 'se ha actualizado la relación usuario_playlist',
            'id' => $user_playlist->id_user_playlist,
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
    }
}
