<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Song;
use App\Models\Like;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();
        foreach ($users as $user) {
            $amount_likes = rand(0, Song::count());
            $songs = collect(Song::all());
            for ($i = 0; $i < $amount_likes; $i++) {
                $song = $songs->random();
                $like = new Like();
                $like->id_user = $user->id_user;
                $like->id_song = $song->id_song;
                $like->save();
                $songs->forget($songs->search($song));
            }
        }
    }
}
