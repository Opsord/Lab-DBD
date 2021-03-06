<?php

namespace App\Http\Controllers;

use App\Models\Song_server;
use App\Models\Server;
use App\Models\Song;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Song_serverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $SongServs = Song_server::all();
        if (empty($SongServs)) {
            return response()->json(['message' => 'No Song servers found'], 404);
        }
        return response($SongServs);
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
        $newSongServ = new Song_server();

        $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer',
                'id_server' => 'required|integer'

            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $song = Song::find($request->id_song);
        $server = Server::find($request->id_server);

        if($song == NULL){
            return response()->json([
                'respuesta' => 'id de cancion invalido'
            ]);
        }elseif($server == NULL){
            return response()->json([
                'respuesta' => 'id de servidor invalido'
            ]);

        }else{
        $newSongServ->id_song = $request->id_song;
        $newSongServ->id_server = $request->id_server;
        $newSongServ->save();
        return response()->json([
            'respuesta' => 'nuevo interseccion song_server creado ',
            'id' => $newSongServ->id_song_server,
        ], 201);
        }
    }



    public function archive()
    {
        //
        $SongServ = Song_server::onlyTrashed()->get();
        if (empty($SongServ)) {
            return response()->json(['message' => 'No archived Song_Servers found'], 404);
        } else {
            return response($SongServ);
        }
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
        $SongServ = Song_server::find($id);
        if (empty($SongServ)) {
            return response()->json(['message' => 'Song Server intersection not found'], 404);
        }
        return response($SongServ);
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
        $songServ = Song_server::find($id);

        $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer',
                'id_server' => 'required|integer'

            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($songServ == NULL){
            return response()->json([
                'respuesta' => 'id de interseccion song_server invalido'
            ]);
        }

        $song = Song::find($request->id_song);
        $server = Server::find($request->id_server);

        if($song == NULL){
            return response()->json([
                'respuesta' => 'id de cancion invalido'
            ]);
        }elseif($server == NULL){
            return response()->json([
                'respuesta' => 'id de servidor invalido'
            ]);

        }else{
        $songServ->id_song = $request->id_song;
        $songServ->id_server = $request->id_server;
        $songServ->save();
        return response()->json([
            'respuesta' => 'nuevo interseccion song_server creado ',
            'id' => $songServ->id_song_server,
        ], 200);
        }
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
        $songServ = Song_server::withTrashed() -> find($id);
        if(empty($songServ)) {
            return response()->json([
                'message' => 'Song_server intersection not found'
            ], 404);
        }
        if($songServ->trashed()){
            $songServ->forceDelete();
            return response()->json([
                'message' => 'Song_server intersection hard deleted',
                'id' => $songServ->id_song_server
            ], 200);
        } else {
            $songServ->delete();
            return response()->json([
                'message' => 'Song_server intersection soft deleted',
                'id' => $songServ->id_song_server
            ], 200);
        }
    }

    public function restore($id)
    {
        //
        $songServ = Song_server::onlyTrashed() -> find($id);
        if(empty($songServ)) {
            return response()->json([
                'message' => 'Song_server intersection not found'
            ], 404);
        }
        $songServ->restore();
        return response()->json([
            'message' => 'Song_server intersection restored',
            'id' => $songServ->id_song_server
        ], 200);
    }

    public function restoreAll()
    {
        //
        $songServ = Song_server::onlyTrashed() -> get();
        if(empty($songServ)) {
            return response()->json([
                'message' => 'Song_server intersections not found'
            ], 404);
        }
        
        
        foreach ($songServ as $songServ) {
            $songServ->restore();
        }

        return response()->json([
            'message' => 'Song_server intersections restored'
        ], 200);
    }
}
