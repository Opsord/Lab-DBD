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
Route::put('/user_update/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\UserController@destroy');

Route::get('/permission/{id}', 'App\Http\Controllers\PermissionController@show');
Route::get('/permissions', 'App\Http\Controllers\PermissionController@index');
Route::post('/permission/create', 'App\Http\Controllers\PermissionController@store');
Route::put('/permission_update/{id}', 'App\Http\Controllers\PermissionController@update');

Route::get('/users_users', 'App\Http\Controllers\User_userController@index');
Route::get('/user_user/{id}', 'App\Http\Controllers\User_userController@show');
Route::post('/user_user/create', 'App\Http\Controllers\User_userController@store');
Route::put('/user_user_update/{id}', 'App\Http\Controllers\User_userController@update');

Route::get('/users_roles', 'App\Http\Controllers\User_roleController@index');
Route::get('/user_role/{id}', 'App\Http\Controllers\User_roleController@show');
Route::post('/user_role/create', 'App\Http\Controllers\User_roleController@store');
Route::put('/user_role_update/{id}', 'App\Http\Controllers\User_roleController@update');

Route::get('/roles', 'App\Http\Controllers\RoleController@index');
Route::get('/role/{id}', 'App\Http\Controllers\RoleController@show');
Route::post('/role/create', 'App\Http\Controllers\RoleController@store');
Route::put('/role_update/{id}', 'App\Http\Controllers\RoleController@update');


Route::get('/roles_permissions', 'App\Http\Controllers\Role_permissionController@index');
Route::get('/role_permission/{id}', 'App\Http\Controllers\Role_permissionController@show');
Route::post('/role_permission/create', 'App\Http\Controllers\Role_permissionController@store');
Route::put('/role_permission_update/{id}', 'App\Http\Controllers\Role_permissionController@update');

#Zelaya:
Route::get('/distributors', 'App\Http\Controllers\DistributorController@index');
Route::get('/distributor/{id}', 'App\Http\Controllers\DistributorController@show');
Route::post('/distributor/create', 'App\Http\Controllers\DistributorController@store');
Route::get('/distributors/archive', 'App\Http\Controllers\DistributorController@archive');
Route::put('/distributor/update/{id}', 'App\Http\Controllers\DistributorController@update');
Route::delete('/distributor/delete/{id}', 'App\Http\Controllers\DistributorController@destroy');

Route::get('/albums', 'App\Http\Controllers\AlbumController@index');
Route::get('/album/{id}', 'App\Http\Controllers\AlbumController@show');
Route::post('/album/create', 'App\Http\Controllers\AlbumController@store');
Route::get('/albums/archive', 'App\Http\Controllers\AlbumController@archive');
Route::put('/album/update/{id}', 'App\Http\Controllers\AlbumController@update');
Route::delete('/album/delete/{id}', 'App\Http\Controllers\AlbumController@destroy');

Route::get('/genres', 'App\Http\Controllers\GenreController@index');
Route::get('/genre/{id}', 'App\Http\Controllers\GenreController@show');
Route::post('/genre/create', 'App\Http\Controllers\GenreController@store');
Route::get('/genres/archive', 'App\Http\Controllers\GenreController@archive');
Route::put('/genre/update/{id}', 'App\Http\Controllers\GenreController@update');
Route::delete('/genre/delete/{id}', 'App\Http\Controllers\GenreController@destroy');

Route::get('/geographic_restrictions', 'App\Http\Controllers\Geographic_restrictionController@index');
Route::get('/geographic_restriction/{id}', 'App\Http\Controllers\Geographic_restrictionController@show');
Route::post('/geographic_restriction/create', 'App\Http\Controllers\Geographic_restrictionController@store');
Route::get('/geographic_restrictions/archive', 'App\Http\Controllers\Geographic_restrictionController@archive');
Route::put('/geographic_restriction/update/{id}', 'App\Http\Controllers\Geographic_restrictionController@update');
Route::delete('/geographic_restriction/delete/{id}', 'App\Http\Controllers\Geographic_restrictionController@destroy');

Route::get('/songs', 'App\Http\Controllers\SongController@index');
Route::get('/song/{id}', 'App\Http\Controllers\SongController@show');
Route::post('/song/create', 'App\Http\Controllers\SongController@store');
Route::get('/songs/archive', 'App\Http\Controllers\SongController@archive');
Route::put('/song/update/{id}', 'App\Http\Controllers\SongController@update');
Route::delete('/song/delete/{id}', 'App\Http\Controllers\SongController@destroy');

Route::get('/song_genres', 'App\Http\Controllers\Song_genreController@index');
Route::get('/song_genre/{id}', 'App\Http\Controllers\Song_genreController@show');
Route::post('/song_genre/create', 'App\Http\Controllers\Song_genreController@store');
Route::get('/song_genres/archive', 'App\Http\Controllers\Song_genreController@archive');
Route::put('/song_genre/update/{id}', 'App\Http\Controllers\Song_genreController@update');
Route::delete('/song_genre/delete/{id}', 'App\Http\Controllers\Song_genreController@destroy');

Route::get('/song_georecs', 'App\Http\Controllers\Song_georecController@index');
Route::get('/song_georec/{id}', 'App\Http\Controllers\Song_georecController@show');
Route::post('/song_georec/create', 'App\Http\Controllers\Song_georecController@store');
Route::get('/song_georecs/archive', 'App\Http\Controllers\Song_georecController@archive');
Route::put('/song_georec/update/{id}', 'App\Http\Controllers\Song_georecController@update');
Route::delete('/song_georec/delete/{id}', 'App\Http\Controllers\Song_georecController@destroy');

#Valero
Route::get('/users', 'App\Http\Controllers\SubscriptionController@index');
Route::get('/user/{id}', 'App\Http\Controllers\SubscriptionController@show');
Route::post('/user/create', 'App\Http\Controllers\SubscriptionController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\SubscriptionController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\SubscriptionController@destroy');

Route::get('/users', 'App\Http\Controllers\Payment_methodController@index');
Route::get('/user/{id}', 'App\Http\Controllers\Payment_methodController@show');
Route::post('/user/create', 'App\Http\Controllers\Payment_methodController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\Payment_methodController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\Payment_methodController@destroy');

Route::get('/users', 'App\Http\Controllers\ReceiptController@index');
Route::get('/user/{id}', 'App\Http\Controllers\ReceiptController@show');
Route::post('/user/create', 'App\Http\Controllers\ReceiptController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\ReceiptController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\ReceiptController@destroy');

Route::get('/users', 'App\Http\Controllers\ServerController@index');
Route::get('/user/{id}', 'App\Http\Controllers\ServerController@show');
Route::post('/user/create', 'App\Http\Controllers\ServerController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\ServerController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\ServerController@destroy');

Route::get('/users', 'App\Http\Controllers\Song_serverController@index');
Route::get('/user/{id}', 'App\Http\Controllers\Song_serverController@show');
Route::post('/user/create', 'App\Http\Controllers\Song_serverController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\Song_serverController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\Song_serverController@destroy');

#Haristoy
Route::get('/users', 'App\Http\Controllers\LikeController@index');
Route::get('/user/{id}', 'App\Http\Controllers\LikeController@show');
Route::post('/user/create', 'App\Http\Controllers\LikeController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\LikeController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\LikeController@destroy');

Route::get('/users', 'App\Http\Controllers\PlaylistController@index');
Route::get('/user/{id}', 'App\Http\Controllers\PlaylistController@show');
Route::post('/user/create', 'App\Http\Controllers\PlaylistController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\PlaylistController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\PlaylistController@destroy');

Route::get('/users', 'App\Http\Controllers\Song_playlistController@index');
Route::get('/user/{id}', 'App\Http\Controllers\Song_playlistController@show');
Route::post('/user/create', 'App\Http\Controllers\Song_playlistController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\Song_playlistController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\Song_playlistController@destroy');

Route::get('/users', 'App\Http\Controllers\User_playlistController@index');
Route::get('/user/{id}', 'App\Http\Controllers\User_playlistController@show');
Route::post('/user/create', 'App\Http\Controllers\User_playlistController@store');
Route::put('/user_update/{id}', 'App\Http\Controllers\User_playlistController@update');
Route::delete('/user_delete/{id}', 'App\Http\Controllers\User_playlistController@destroy');