<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use App\Models\Genre;
use App\Models\Geographic_restriction;

use Illuminate\Support\Facades\Validator;
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
        if (empty($songs)) {
            return response()->json(['message' => 'No songs found'], 404);
        }
        return view('song')->with('songs', $songs);
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
                'explicit' => 'required|string',
                'id_album' => 'required|integer',
                'id_genre' => 'required|integer',
                'id_country' => 'required|integer'
            ]
        );

        $newsong = new Song();
        $album = Album::find($request->id_album);
        $genre = Genre::find($request->id_genre);
        $country = Geographic_restriction::find($request->id_country);
        if($album == NULL){
            return response()->json([
                'respuesta' => 'id de album invalido'
            ]);
        }
        if($genre == NULL){
            return response()->json([
                'respuesta' => 'id de genero invalido'
            ]);
        }
        if($country == NULL){
            return response()->json([
                'respuesta' => 'id de pais invalido'
            ]);
        }
        if ($request->explicit == "true" || $request->explicit == "false"){
            $newsong->name_song = $request->name_song;
            $newsong->duration = $request->duration;
            if($request->explicit == "true"){
                $newsong->is_explicit = 1; 
            }else{
                $newsong->is_explicit = 0; 
            }
            $newsong->album = $request->id_album;
            $newsong->genre = $request->id_genre;
            $newsong->country = $request->id_country;
            $newsong->save();

            return back();
        }else{
            return response()->json([
                'respuesta' => 'explicit debe ser true o false'
            ]);
        }
        
    }

    public function archive()
    {
        //
        $songs = Song::onlyTrashed()->get();
        if (empty($songs)) {
            return response()->json(['message' => 'No archived songs found'], 404);
        } else {
            return response($songs, 200);
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
        $song = Song::find($id);
        if (empty($song)) {
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
        if (empty($song)) {
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
        $song = Song::withTrashed() -> find($id);
        if (empty($song)) {
            return response()->json(['message' => 'Song not found'], 404);
        }

        if ($song->trashed()) {
            $song->forceDelete();
            return response()->json([
                'respuesta' => 'Song hard deleted',
                'id' => $song->id_song,
            ], 200);
        } else {
            $song->delete();
            return back();
        }
    }

    public function restore($id)
    {
        //
        $song = Song::onlyTrashed() -> find($id);
        if (empty($song)) {
            return response()->json(['message' => 'Song not found'], 404);
        }

        $song->restore();
        return response()->json([
            'respuesta' => 'Song restored',
            'id' => $song->id_song,
        ], 200);
    }

    public function restoreAll()
    {
        //
        $songs = Song::onlyTrashed()->get();
        if (empty($songs)) {
            return response()->json(['message' => 'No archived songs found'], 404);
        }
        foreach ($songs as $song) {
            $song->restore();
        }
        return response()->json([
            'respuesta' => 'All songs restored',
        ], 200);
    }
}
