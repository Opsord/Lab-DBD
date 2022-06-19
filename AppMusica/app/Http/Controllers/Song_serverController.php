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
        if ($SongServs->isEmpty()) {
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
        if ($SongServ->isEmpty()) {
            return response()->json(['message' => 'No archived Song_Servers found'], 404);
        }
        return response($SongServ, 200);
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
        if (!$SongServ) {
            return response()->json(['message' => 'Song Server not found'], 404);
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
        $songServ = Song_server::find($id);
        if(!$songServ){
            return response()->json([
                'respuesta' => 'id de interseccion song_server invalido'
            ], 404);
        }

        $songServ->delete();

        return response()->json([
            'respuesta' => 'interseccion song_server eliminada',
            'id' => $songServ->id_song_server,
        ], 200);
    }
}
