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
Route::post('/user_user/create', 'App\Http\Controllers\User_userController@store');

Route::get('/users_roles', 'App\Http\Controllers\User_roleController@index');
Route::get('/user_role/{id}', 'App\Http\Controllers\User_roleController@show');

Route::get('/roles', 'App\Http\Controllers\RoleController@index');
Route::get('/role/{id}', 'App\Http\Controllers\RoleController@show');
Route::post('/role/create', 'App\Http\Controllers\RoleController@store');

#Zelaya:
Route::get('/distributors', 'App\Http\Controllers\DistributorController@index');
Route::get('/distributor/{id}', 'App\Http\Controllers\DistributorController@show');
Route::post('/distributor/create', 'App\Http\Controllers\DistributorController@store');
Route::put('/distributor/{id}', 'App\Http\Controllers\DistributorController@update');
Route::delete('/distributor/{id}', 'App\Http\Controllers\DistributorController@destroy');

Route::get('/albums', 'App\Http\Controllers\AlbumController@index');
Route::get('/album/{id}', 'App\Http\Controllers\AlbumController@show');
Route::post('/album/create', 'App\Http\Controllers\AlbumController@store');
Route::put('/album/{id}', 'App\Http\Controllers\AlbumController@update');
Route::delete('/album/{id}', 'App\Http\Controllers\AlbumController@destroy');

Route::get('/genres', 'App\Http\Controllers\GenreController@index');
Route::get('/genre/{id}', 'App\Http\Controllers\GenreController@show');
Route::post('/genre/create', 'App\Http\Controllers\GenreController@store');
Route::put('/genre/{id}', 'App\Http\Controllers\GenreController@update');
Route::delete('/genre/{id}', 'App\Http\Controllers\GenreController@destroy');

Route::get('/geographic_restrictions', 'App\Http\Controllers\Geographic_restrictionController@index');
Route::get('/geographic_restriction/{id}', 'App\Http\Controllers\Geographic_restrictionController@show');
Route::post('/geographic_restriction/create', 'App\Http\Controllers\Geographic_restrictionController@store');
Route::put('/geographic_restriction/{id}', 'App\Http\Controllers\Geographic_restrictionController@update');
Route::delete('/geographic_restriction/{id}', 'App\Http\Controllers\Geographic_restrictionController@destroy');

Route::get('/songs', 'App\Http\Controllers\SongController@index');
Route::get('/song/{id}', 'App\Http\Controllers\SongController@show');
Route::post('/song/create', 'App\Http\Controllers\SongController@store');
Route::put('/song/{id}', 'App\Http\Controllers\SongController@update');
Route::delete('/song/{id}', 'App\Http\Controllers\SongController@destroy');

Route::get('/song_genres', 'App\Http\Controllers\Song_genreController@index');
Route::get('/song_genre/{id}', 'App\Http\Controllers\Song_genreController@show');
Route::post('/song_genre/create', 'App\Http\Controllers\Song_genreController@store');
Route::put('/song_genre/{id}', 'App\Http\Controllers\Song_genreController@update');
Route::delete('/song_genre/{id}', 'App\Http\Controllers\Song_genreController@destroy');

Route::get('/song_georecs', 'App\Http\Controllers\Song_georecController@index');
Route::get('/song_georec/{id}', 'App\Http\Controllers\Song_georecController@show');
Route::post('/song_georec/create', 'App\Http\Controllers\Song_georecController@store');
Route::put('/song_georec/{id}', 'App\Http\Controllers\Song_georecController@update');
Route::delete('/song_georec/{id}', 'App\Http\Controllers\Song_georecController@destroy');