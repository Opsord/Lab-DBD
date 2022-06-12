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
        if ($song_genres->isEmpty()) {
            return response()->json(['message' => 'No song_genres found'], 404);
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
            'respuesta' => 'nuevo interseccion song_genre creado',
        ]);
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
        if (!$song_genre) {
            return response()->json(['message' => 'Song_genre not found'], 404);
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
