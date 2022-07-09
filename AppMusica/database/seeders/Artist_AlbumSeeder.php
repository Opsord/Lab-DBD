<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User_role;
use App\Models\Album;
use App\Models\Artist_Album;

class Artist_AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $albums = Album::all();
        $artists = User_role::where('id_role', 3)->get();
        foreach ($albums as $album) {
            $artist = $artists->random();
            $artist_album = new Artist_Album();
            $artist_album->artist = $artist->id_user;
            $artist_album->album = $album->id_album;
            $artist_album->save();
        }
    }
}
