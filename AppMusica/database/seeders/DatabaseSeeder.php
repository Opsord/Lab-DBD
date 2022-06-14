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
        Genre::factory(10)->create();
        Distributor::factory(10)->create();
        Geographic_restriction::factory(10)->create();
        Role::factory(10)->create();
        Permission::factory(10)->create();
        Payment_method::factory(10)->create();
        Playlist::factory(10)->create();
        Receipt::factory(10)->create();
        Subscription::factory(10)->create();
        User::factory(10)->create();
        Album::factory(10)->create();
        Song::factory(10)->create();
        Song_genre::factory(10)->create();
        Song_GeoRec::factory(10)->create();
        User_role::factory(10)->create();
        Role_permission::factory(10)->create();
        User_user::factory(10)->create();
        Server::factory(10)->create();
        Song_server::factory(10)->create();
        Like::factory(10)->create();
        Song_playlist::factory(10)->create();
        User_playlist::factory(10)->create();
        
    }
}
