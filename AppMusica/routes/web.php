<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

#Ijurra
Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::get('/user/{id}', 'App\Http\Controllers\UserController@show');
Route::post('/user/create', 'App\Http\Controllers\UserController@store');

Route::get('/permission/{id}', 'App\Http\Controllers\PermissionController@show');
Route::get('/permissions', 'App\Http\Controllers\PermissionController@index');
Route::post('/permission/create', 'App\Http\Controllers\PermissionController@store');

Route::get('/users_users', 'App\Http\Controllers\User_userController@index');
Route::get('/user_user/{id}', 'App\Http\Controllers\User_userController@show');

Route::get('/users_roles', 'App\Http\Controllers\User_roleController@index');
Route::get('/user_role/{id}', 'App\Http\Controllers\User_roleController@show');

Route::get('/roles', 'App\Http\Controllers\RoleController@index');
Route::get('/role/{id}', 'App\Http\Controllers\RoleController@show');
Route::post('/role/create', 'App\Http\Controllers\RoleController@store');

#Zelaya:
Route::get('/distributors', 'App\Http\Controllers\DistributorController@index');
Route::get('/distributor/{id}', 'App\Http\Controllers\DistributorController@show');

Route::get('/albums', 'App\Http\Controllers\AlbumController@index');
Route::get('/album/{id}', 'App\Http\Controllers\AlbumController@show');

Route::get('/genres', 'App\Http\Controllers\GenreController@index');
Route::get('/genre/{id}', 'App\Http\Controllers\GenreController@show');

Route::get('/geographic_restrictions', 'App\Http\Controllers\Geographic_restrictionController@index');
Route::get('/geographic_restriction/{id}', 'App\Http\Controllers\Geographic_restrictionController@show');

Route::get('/songs', 'App\Http\Controllers\SongController@index');
Route::get('/song/{id}', 'App\Http\Controllers\SongController@show');

Route::get('/song_genres', 'App\Http\Controllers\Song_genreController@index');
Route::get('/song_genre/{id}', 'App\Http\Controllers\Song_genreController@show');

Route::get('/song_georecs', 'App\Http\Controllers\Song_georecController@index');
Route::get('/song_georec/{id}', 'App\Http\Controllers\Song_georecController@show');