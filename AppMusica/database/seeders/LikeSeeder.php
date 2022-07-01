<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            $songs = Song::all();
            $num_likes = rand(0, count($songs));
            for ($i = 0; $i < $num_likes; $i++) {
                $like = new Like();
                $like->id_user = $user->id_user;
                $like->id_song = $songs->random()->id_song;
                $like->save();
                $id_aux = $like->id_song;
                //borrar canción de la lista
                //$songs->forget($songs->search($id_aux, $songs, true)); 
            }
        }
    }
}