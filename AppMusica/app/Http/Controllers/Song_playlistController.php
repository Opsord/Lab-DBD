<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Song_playlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $song_playlists = Song_playlist::all();
        if($song_playlist->isEmpty()){
            return response()->json(['message'=>'No song_playlists found'], 404);
        }
        return response($song_playlist, 200);
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
        $newSongPlay = new Song_playlist();

        $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer',
                'id_playlist' => 'reuired|integer'
            ]
        );
        
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $song = Song::find($request->id_song);
        $playlist = Playlist::find($request->id_playlist);

        if($song == NULL){
            return response()->json([
                'respuesta' => 'id de canción invalido'  
            ]);
        }else if($playlist == NULL){
            return response()->json([
                'respuesta' => 'id de playlist invalido'
            ]);
        }else{
            $newSongPlay->id_song = $request->id_song;
            $newSongPlay->id_playlist = $request->id_playlist;
            $newSongPlay->save();
            return response()->json([
                'respuesta' => 'Nueva instersección song_playlist creada',
                'id' => $newSongPlay->id_song_playlist,
            ], 201);
        }
    }

    public function archive()
    {
        //
        $songs_playlist = Song_playlist::onlyTrashed()->get();
        if ($songs_playlist->isEmpty()) {
            return response()->json(['message' => 'No archived song_playlist found'], 404);
        }
        return response($songs_playlist, 200);
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
        $song_playlist = Song_playlist::find($id);
        if(empty($song_playlist)){
            return response()->json([]);
        }
        return response($song_playlist, 200);
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
        $song_playlist = Song_playlist::find($id);
        $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer',
                'id_playlist' => 'required|integer'
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($song_playlist == NULL){
            return response()->json([
                'respuesta' => 'id de canción_playlist invalido'
            ]);
        }

        $song = Song::find($request->id_song);
        $playlist = Playlist::find($request->id_playlist);
        if($song == NULL){
            return response()->json([
                'respuesta' => 'id de canción invalido'
            ]);
        }else if($playlist == NULL){
            return response()->json([
                'respuesta' => 'id de playlist invalido'
            ]);
        }

        $song_playlist->id_song = $request->id_song;
        $song_playlist->id_playlist = $request->id_playlist;
        $song_playlist->save();
        return response()->json([
            'respuesta' => 'se ha actualizado la relación canción_playlist',
            'id' => $song_playlist->id_song_playlist,
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
