<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use App\Models\Song_genre;
use App\Models\Geographic_restriction;
use App\Models\User;
use App\Models\Genre;

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
        $songs = Song::orderby('id_song','ASC')->get(); 
        if (empty($songs)) {
            return response()->json(['message' => 'No songs found'], 404);
        }
        $album = Album::all();
        return view('song')->with('songs', $songs)->with('album', $album);
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
                'id_artist' => 'required|integer',
                'id_genre' => 'required|integer',
                'reproducciones' => 'required|integer'
            ]
        );

        $newsong = new Song();
        $newsong_genre = new Song_genre();
        $album = Album::find($request->id_album);
        $artist = User::find($request->id_artist);
        $genre = Genre::find($request->id_genre);
        if($album == NULL){
            return response()->json([
                'respuesta' => 'id de album invalido'
            ]);
        }

        if($artist == NULL){
            return response()->json([
                'respuesta' => 'id del artista invalido'
            ]);
        }

        if($genre == NULL){
            return response()->json([
                'respuesta' => 'id del artista invalido'
            ]);
        }



        if ($request->explicit == "true" || $request->explicit == "false"){
            $newsong->name_song = $request->name_song;
            $newsong->duration = $request->duration;
            $newsong->is_explicit = $request->explicit;
            $newsong->album = $request->id_album;
            $newsong->artist = $request->id_artist;
            $newsong->reproducciones = $request->reproducciones;
            $newsong->save();
            $newsong_genre->song = $newsong->id_song;
            $newsong_genre->genre = $request->id_genre;
            
            $newsong_genre->save();
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
        $album = Album::all();
        if (empty($songs)) {
            return response()->json(['message' => 'No archived songs found'], 404);
        } else {
            return view('songtrash')->with('songs', $songs)->with('album', $album);
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
                'explicit' => 'required|string',
                'id_album' => 'required|integer',
                'id_artist' => 'required|integer'
            ]
        );

        if ($validator -> fails()) {
            return response()->json(['message' => errors()], 400);
        }

        $song = Song::find($id);
        $album = Album::find($request->id_album);
        $artist = User::find($request->id_artist);

        if (empty($song)) {
            return response()->json(['message' => 'Song not found'], 404);
        }
       
        if($album == NULL){
            return response()->json([
                'respuesta' => 'id de album invalido'
            ]);
        }

        if($artist == NULL){
            return response()->json([
                'respuesta' => 'id del artista invalido'
            ]);
        }
        $song->name_song = $request->name_song;
        $song->duration = $request->duration;
        $song->album = $request->id_album;
        $song->artist = $request->id_artist;
        $song->is_explicit = $request->explicit;
        $song->save();

        return back();
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
        return back();
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
        return back();
    }

    public function play($id){
        $song = Song::find($id);
        $song->reproducciones ++;
        $song->save();
        return redirect("https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    }
}
