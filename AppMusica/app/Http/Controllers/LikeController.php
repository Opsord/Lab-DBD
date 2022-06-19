<?php

namespace App\Http\Controllers;

use App\Models\Like;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $likes = Like::all();
        if($likes->isEmpty()){
            return response()->json(['message'=>'No likes found'], 404);
        }
        return response($likes, 200);

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
        $newLike = new Like();

        $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer',
                'id_user' => 'required|integer'
            ]
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $Song = Song::find($request->song);
        $User = User::find($request->user);
        if($Song == NULL){
           return response()->json([
                'respuesta' => 'id de la canción invalido' 
           ]);
        }else if($User == NULL){
            return response()->json([
                'respuesta' => 'id del usuario invalido'
            ]);
        }else{
            $newLike->id_song = $request->id_song;
            $newLike->id_user = $request->id_user;
            $newLike->save();
            return repose()->json([
                'respuesta' => 'Se ha creado un like',
                'id' => $newLike-> id_like,
            ], 201);
        }

    }

    public function archive()
    {
        //
        $likes = Like::onlyTrashed()->get();
        if ($likes->isEmpty()) {
            return response()->json(['message' => 'No archived like found'], 404);
        }
        return response($like, 200);
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
        $like = Like::find($id);
        if(empty($like)){
            return response()->json([]);
        }
        return response($like, 200);
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
        $like = Like::find($id);
        $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer',
                'id_user' => 'required|integer'
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($like == NULL){
            return response()->json([
                'respuesta' => 'id de like invalido'
            ]);
        }

        $song = Song::find($request->id_song);
        $user = User::find($request->id_user);
        if($song == NULL){
            return response()->json([
                'respuesta' => 'id de canción invalido'
            ]);
        }else if($user == NULL){
            return response()->json([
                'respuesta' => 'id de usuario invalido'
            ]);
        }

        $like->id_song = $request->id_song;
        $like->id_user = $request->id_user;
        $like->save();
        return response()->json([
            'respuesta' => 'se ha actualizado like',
            'id' => $like->id_like,
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
        $Like = Like::find($id);

        if(!$Like){
            return response()->json(['message' => 'Like not found'], 404);
        }

        $Like->delete();

        return response()->json([
            'message' => 'Like soft deleted',
            'id' => $Like->id_like,
        ], 200);
    }
}
