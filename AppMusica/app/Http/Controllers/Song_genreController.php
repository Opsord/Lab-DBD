<?php

namespace App\Http\Controllers;

use App\Models\Song_genre;

use illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Song_genreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $song_genres = Song_genre::all();
        if (empty($song_genres)) {
            return response()->json(['message' => 'No song_genres intersections found'], 404);
        }
        return response($song_genres, 200);
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
                'song' => 'required',
                'genre' => 'required',
            ]
        );

        $newsong_genre = new Song_genre();
        $newsong_genre->song = $request->song;
        $newsong_genre->genre = $request->genre;
        $newsong_genre->save();

        return response()->json([
            'message' => 'nuevo interseccion song_genre creado',
        ]);
    }


    public function archive()
    {
        //
        $song_genres = Song_genre::onlyTrashed()->get();
        if (empty($song_genres)) {
            return response()->json(['message' => 'No archived song_genres found'], 404);
        } else {
            return response($song_genres, 200);
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
        $song_genre = Song_genre::find($id);
        if (empty($song_genre)) {
            return response()->json(['message' => 'Song_genre intersection not found'], 404);
        }
        return response($song_genre, 200);
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
        $validador = Validator::make(
            $request->all(),[
                'song' => 'required',
                'genre' => 'required',
            ]
        );

        if ($validador->fails()) {
            return response()->json(['message' => errors()], 400);
        }

        $song_genre = Song_genre::find($id);
        if (empty($song_genre)) {
            return response()->json(['message' => 'Song_genre not found'], 404);
        }

        $song_genre->song = $request->song;
        $song_genre->genre = $request->genre;
        $song_genre->save();

        return response()->json([
            'message' => 'interseccion song_genre actualizada',
        ]);
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
        $song_genre = Song_genre::withTrashed() -> find($id);
        if (empty($song_genre)) {
            return response()->json(['message' => 'Song_genre intersection not found'], 404);
        }

        if ($song_genre->trashed()) {
            $song_genre->forceDelete();
            return response()->json([
                'message' => 'Song_genre intersection hard deleted',
                'id' => $song_genre->$id_song_genre
                ]);
        } else {
            $song_genre->delete();
            return response()->json([
                'message' => 'Song_genre intersection soft deleted',
                'id' => $song_genre->$id_song_genre
                ]);
        }
    }

    public function restore($id)
    {
        //
        $song_genre = Song_genre::onlyTrashed() -> find($id);
        if (empty($song_genre)) {
            return response()->json(['message' => 'Song_genre intersection not found'], 404);
        }

        $song_genre->restore();
        return response()->json([
            'message' => 'Song_genre intersection restored',
            'id' => $song_genre->$id_song_genre
            ]);
    }

    public function restoreAll()
    {
        //
        $song_genres = Song_genre::onlyTrashed()->get();
        if (empty($song_genres)) {
            return response()->json(['message' => 'No archived song_genres found'], 404);
        }
        foreach ($song_genres as $song_genre) {
            $song_genre->restore();
        }
        return response()->json([
            'message' => 'All song_genres intersections restored'
            ]);
    }
}
