<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\User_role;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\Album;
use App\Models\User;
use App\Models\Artist_Album;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Login::first();
        if($user == NULL){
            return redirect('/');
        } 
        $user = User::where('id_user', $user->id_user)->first();
        $artist = User::all();
        $playlists  = Playlist::all();
        $songs = Song::all();
        $albums = Album::all();
        $artist_albums = Artist_Album::all();
        $role = User_role::where('id_user', $user->id_user)->first();

        //return view('library')->with('artist', $artist)->with('playlists', $playlists)->with('songs', $songs)->with('albums', $albums)->with('artist_albums', $artist_albums);



        return view('library', [
            'playlists' => $playlists,
            'songs' => $songs,
            'albums' => $albums,
            'artist' => $artist,
            'artist_albums' => $artist_albums,
            'role' => $role,
            'user' => $user
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

    public function gotosong($id)
    {
        $song = Song::where('id_song', $id)->first();
        $artist = User::all();
        $user = Login::first();
        return view('songview', [
            'id' => $id,
            'song' => $song,
            'artist' => $artist,
            'user' => $user

        ]);
    }
}
