<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Login;
use App\Models\Artist_Album;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albums = Album::all();
        if (empty($albums)) {
            return response()->json(['message' => 'No albums found'], 404);
        }
        return response($albums, 200);
    }

    public function artistalbum(){
        $artist = Login::first();
        $album = Artist_Album::where('artist', $artist->id_user)
        ->join('albums', 'albums.id_album', '=' , 'artist__albums.album')->get();
        return view('artistalbum')->with('album', $album);
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
                'name_album' => 'required',
                'release_date' => 'required',
                'distributed_by' => 'required'
            ]
        );

        $newalbum = new Album();
        $newalbum->name_album = $request->name_album;
        $newalbum->release_date = $request->release_date;
        $newalbum->distributed_by = $request->distributed_by;
        $newalbum->save();

        return response()->json([
            'respuesta' => 'New album created',
            'id' => $newalbum->id_album,
        ], 201);
    }

    public function archive()
    {
        //
        $albums = Album::onlyTrashed()->get();
        if (empty($albums)) {
            return response()->json(['message' => 'No archived albums found'], 404);
        } else {
            return response($albums, 200);
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
        $album = Album::find($id);
        if (empty($album)) {
            return response()->json(['message' => 'Album not found'], 404);
        }
        return response($album, 200);
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
                'name_album' => 'required',
                'release_date' => 'required',
                'distributed_by' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $album = Album::find($id);
        if (empty($album)) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        $album->name_album = $request->name_album;
        $album->release_date = $request->release_date;
        $album->distributed_by = $request->distributed_by;
        $album->save();

        return response()->json([
            'respuesta' => 'Album updated',
            'id' => $album->id_album
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
        $album = Album::withTrashed() -> find($id);
        
        if (empty($album)) {
            return response()->json(['message' => 'Album not found'], 404);
        }

        if ($album -> trashed()) {
            $album -> forceDelete();
            return response()->json([
                'message' => 'Album hard deleted',
                'id' => $album->id_albums
            ], 200);
        } else {
            $album -> delete();
            return response()->json([
                'message' => 'Album soft deleted',
                'id' => $album->id_album
                ], 200);
        }
    }

    public function restore($id)
    {
        //
        $album = Album::onlyTrashed() -> find($id);
        if (empty($album)) {
            return response()->json(['message' => 'Album not found'], 404);
        }
        $album -> restore();
        return response()->json([
            'message' => 'Album restored',
            'id' => $album->id_album
        ], 200);
    }

    public function restoreAll()
    {
        //
        $albums = Album::onlyTrashed() -> get();

        if (empty($albums)) {
            return response()->json(['message' => 'No archived albums found'], 404);
        }
        
        foreach ($albums as $album) {
            $album -> restore();
        }
        return response()->json([
            'message' => 'Albums restored',
            'albums' => $albums
            ], 200);
    }
}
