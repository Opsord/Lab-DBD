<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
use App\Models\User_playlist;
use App\Models\Like;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;


class ProfileController extends Controller
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
        $user_playlists = User_playlist::where('id_user', $user->id_user)->get();
        $playlists  = Playlist::all();
        $user_like = Like::where('id_user', $user->id_user)->get();
        $songs = Song::all();
        $artist = User::all();
        $users_playlist = User_playlist::all();
        return view('profile', [
            'user' => $user,
            'playlists' => $playlists,
            'songs' => $songs,
            'artist' => $artist,
            'user_playlists' => $user_playlists,
            'user_like' => $user_like
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
        $validator = Validator::make(
            $request->all(),[
                'id_song' => 'required|integer',
                'id_user' => 'required|integer',
            ]
        );

        $newlike = new Like();
        $newlike->id_user = $request->id_user;
        $newlike->id_song = $request->id_song;
        $newlike->save();


        return back();
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
