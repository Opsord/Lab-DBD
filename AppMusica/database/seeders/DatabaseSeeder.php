<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\Distributor;
use App\Models\Geographic_location;
use App\Models\Role;
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
        Geographic_location::factory(10)->create();
        Role::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
