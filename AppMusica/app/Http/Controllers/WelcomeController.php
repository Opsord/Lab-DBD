<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\User_role;
use App\Models\User;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\Album;
use App\Models\Artist_Album;
use App\Models\User_playlist;
class WelcomeController extends Controller
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
        $role = User_role::where('id_user', $user->id_user)->first();
        $top10 = Song::orderby('reproducciones', 'DESC')->get();
        $artist = User::all();
        $playlists = Playlist::all();
        $albums = Album::all();
        $artist_albums = Artist_Album::all();
        $user_playlists = User_playlist::all();
        return view('welcome2', [
            'user' => $user,
            'role' => $role,
            'top10' => $top10,
            'artist' => $artist,
            'playlists' => $playlists,
            'albums' => $albums,
            'artist_albums' => $artist_albums,
            'user_playlists' => $user_playlists
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
}
