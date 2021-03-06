<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $playlists  = Playlist::all();
        $songs = Song::all();
        $users = User::all();
        if(empty($playlists)){
            return response()->json(['message'=>'No playlists  found'], 404);
        }
        return view('profile', [
            'playlists' => $playlists,
            'songs' => $songs,
            'users' => $users
        ]);
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
        $newPlaylist = new Playlist();

        $validator = Validator::make(
            $request->all(),[
                'name_playlist' => 'required',
                'public_state' => 'required',
            ]
        );

        $newPlaylist->name_playlist = $require->name_playlist;
        $newPlaylist->public_state = $require->public_state;
        $newPlaylist->save();
        return response()->json([
            'respuesta' => 'Se creo una nueva Playlist',
            'id' => $newPlaylist->id_playlist
        ], 201);
    }

    public function archive()
    {
        //
        $playlists = Playlist::onlyTrashed()->get();
        if (empty($playlists)) {
            return response()->json(['message' => 'No archived playlist found'], 404);
        } else {
            return response($playlists, 200);
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
        $playlist = Playlist::find($id);
        if(empty($playlist)){
            return response()->json([]);
        }
        return response($playlist, 200);
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
        $playlist = Playlist::find($id);
        $validator = Validator::make(
            $request->all(),[
                'name_playlist' => 'required',
                'public_state' => 'required'
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($playlist == NULL){
            return response()->json([
                'respuesta' => 'id de playlist invalido'
            ]);
        }

        $playlist->name_playlist = $request->name_playlist;
        $playlist->public_state = $request->public_state;
        $user_playlist->save();
        return response()->json([
            'respuesta' => 'se ha actualizado playlist',
            'id' => $playlist->id_playlist,
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
        $Playlist = Playlist::withTrashed() -> find($id);
        
        if(empty($Playlist)) {
            return response()->json([
                'respuesta' => 'Playlist not found'], 404);
        }

        if ($Playlist->trashed()) {
            $Playlist->forceDelete();
            return response()->json([
                'respuesta' => 'Playlist hard deleted',
                'id' => $playlist->id_playlist
                ], 200);
        } else {
            $Playlist->delete();
            return response()->json([
                'respuesta' => 'Playlist soft deleted',
                'id' => $playlist->id_playlist
                ], 200);
        }
    }

    public function restore($id)
    {
        //
        $Playlist = Playlist::withTrashed() -> find($id);
        if(empty($Playlist)) {
            return response()->json([
                'respuesta' => 'Playlist not found'], 404);
        }
        $Playlist->restore();
        return response()->json([
            'respuesta' => 'Playlist restored',
            'id' => $playlist->id_playlist
            ], 200);
    }

    public function restoreAll()
    {
        //
        $Playlist = Playlist::onlyTrashed() -> get();
        if(empty($Playlist)) {
            return response()->json([
                'respuesta' => 'Playlists not found'], 404);
        }
        foreach ($Playlist as $playlist) {
            $playlist->restore();
        }

        return response()->json([
            'respuesta' => 'All playlists restored'
            ], 200);
    }
}
