<?php

namespace App\Http\Controllers;

use App\Models\Song;
use illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $songs = Song::all();
        if ($songs->isEmpty()) {
            return response()->json(['message' => 'No songs found'], 404);
        }
        return response($songs, 200);
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
                'name_song' => 'required',
                'duration' => 'required',
                'id_album' => 'required',
                'id_genre' => 'required',
            ]
        );

        $newsong = new Song();
        $newsong->name_song = $request->name_song;
        $newsong->duration = $request->duration;
        $newsong->id_album = $request->id_album;
        $newsong->id_genre = $request->id_genre;
        $newsong->save();

        return response()->json([
            'respuesta' => 'nueva cancion creada',
            'id' => $newsong->id_song,
        ], 201);
    }

    public function archive()
    {
        //
        $songs = Song::onlyTrashed()->get();
        if ($songs->isEmpty()) {
            return response()->json(['message' => 'No archived songs found'], 404);
        }
        return response($songs, 200);
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
        $song = Song::find($id);
        if (!$song) {
            return response()->json(['message' => 'Song not found'], 404);
        }
        return response($song, 200);
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
                'name_song' => 'required',
                'duration' => 'required',
                'id_album' => 'required',
                'id_genre' => 'required',
            ]
        );

        if ($validator -> fails()) {
            return response()->json(['message' => errors()], 400);
        }

        $song = Song::find($id);
        if (!$song) {
            return response()->json(['message' => 'Song not found'], 404);
        }

        $song->name_song = $request->name_song;
        $song->duration = $request->duration;
        $song->id_album = $request->id_album;
        $song->id_genre = $request->id_genre;
        $song->save();

        return response()->json([
            'respuesta' => 'cancion actualizada',
            'id' => $song->id_song,
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
        $song = Song::find($id);
        if (!$song) {
            return response()->json(['message' => 'Song not found'], 404);
        }

        $song->delete();

        return response()->json([
            'respuesta' => 'cancion eliminada',
            'id' => $song->id_song,
        ], 200);
    }
}
