<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Distributor;
use App\Models\Geographic_restriction;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Payment_method;
use App\Models\Playlist;
use App\Models\Receipt;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Album;
use App\Models\Song;
use App\Models\Server;
use App\Models\Like;
use App\Models\User_user;
use App\Models\Role_permission;
use App\Models\Song_GeoRec;
use App\Models\Song_server;
use App\Models\Song_playlist;
use App\Models\Song_genre;
use App\Models\User_playlist;
use App\Models\User_role;
use App\Models\Artist_Album;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this -> call(GenreSeeder::class);
        Distributor::factory(10)->create();
        Geographic_restriction::factory(15)->create();
        $this -> call(RoleSeeder::class);
        $this -> call(PermissionSeeder::class);
        $this -> call(RolePermissionsSeeder::class);
        Payment_method::factory(5)->create();
        Playlist::factory(10)->create();
        Receipt::factory(20)->create();
        Subscription::factory(20)->create();
        User::factory(20)->create();
        Album::factory(10)->create();
        Song::factory(40)->create();
        Song_genre::factory(40)->create();
        Song_GeoRec::factory(40)->create();
        $this -> call(User_RoleSeeder::class);
        User_user::factory(20)->create();
        Server::factory(10)->create();
        Song_server::factory(40)->create();
        $this -> call(LikeSeeder::class);
        $this -> call(Song_PlaylistSeeder::class);
        User_playlist::factory(50)->create();
        $this -> call(Artist_AlbumSeeder::class);
        
    }
}
