<?php

namespace App\Http\Controllers;

use App\Models\Song_GeoRec;

use illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Song_GeoRecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $song_georecs = Song_GeoRec::all();
        if ($song_georecs->isEmpty()) {
            return response()->json(['message' => 'No song_georecs found'], 404);
        }
        return response($song_georecs, 200);
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
                'restricted_to' => 'required',
            ]
        );

        $newsong_georec = new Song_GeoRec();
        $newsong_georec->song = $request->song;
        $newsong_georec->restricted_to = $request->restricted_to;
        $newsong_georec->save();

        return response()->json([
            'respuesta' => 'nuevo interseccion song_georec creado',
        ]);

    }


    public function archive()
    {
        //
        $georecs = GeoRec::onlyTrashed()->get();
        if ($georecs->isEmpty()) {
            return response()->json(['message' => 'No archived georecs found'], 404);
        }
        return response($georecs, 200);
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
        $song_georec = Song_GeoRec::find($id);
        if (!$song_georec) {
            return response()->json(['message' => 'Song_georec not found'], 404);
        }
        return response($song_georec, 200);
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
                'restricted_to' => 'required',
            ]
        );

        if ($validador->fails()) {
            return response()->json(['error' => $validador->errors()], 400);
        }

        $song_georec = Song_GeoRec::find($id);
        if (!$song_georec) {
            return response()->json(['message' => 'Song_georec not found'], 404);
        }

        $song_georec->song = $request->song;
        $song_georec->restricted_to = $request->restricted_to;
        $song_georec->save();

        return response()->json([
            'respuesta' => 'interseccion song_georec actualizado',
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
        $song_georec = Song_GeoRec::find($id);

        if (!$song_georec) {
            return response()->json(['message' => 'Song_georec intersection not found'], 404);
        }

        $song_georec->delete();

        return response()->json([
            'message' => 'Song_georec intersection soft deleted',
        ]);
    }
}
