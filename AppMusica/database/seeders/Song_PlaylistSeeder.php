<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Song;
use App\Models\Playlist;
use App\Models\Song_Playlist;

class Song_PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $songs = Song::all();
        $playlists = Playlist::all();
        foreach ($songs as $song) {
            $amount_playlists = rand(0, Playlist::count());
            $playlists = collect(Playlist::all());
            for ($i = 0; $i < $amount_playlists; $i++) {
                $playlist = $playlists->random();
                $song_playlist = new Song_Playlist();
                $song_playlist->id_song = $song->id_song;
                $song_playlist->id_playlist = $playlist->id_playlist;
                $song_playlist->save();
                $playlists->forget($playlists->search($playlist));
            }
        }
    }
}
