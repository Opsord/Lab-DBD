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



Route::get('/users', 'App\Http\Controllers\UserController@index');
Route::get('/user/{id}', 'App\Http\Controllers\UserController@show');
Route::post('/user/create', 'App\Http\Controllers\UserController@store');
Route::get('/users/archive', 'App\Http\Controllers\UserController@archive');
Route::put('/user/update/{id}', 'App\Http\Controllers\UserController@update');
Route::delete('/user/delete/{id}', 'App\Http\Controllers\UserController@destroy');

Route::get('/permission/{id}', 'App\Http\Controllers\PermissionController@show');
Route::get('/permissions', 'App\Http\Controllers\PermissionController@index');
Route::post('/permission/create', 'App\Http\Controllers\PermissionController@store');
Route::get('/permissions/archive', 'App\Http\Controllers\PermissionController@archive');
Route::put('/permission/update/{id}', 'App\Http\Controllers\PermissionController@update');
Route::delete('/permission/delete/{id}', 'App\Http\Controllers\PermissionController@destroy');

Route::get('/users_users', 'App\Http\Controllers\User_userController@index');
Route::get('/user_user/{id}', 'App\Http\Controllers\User_userController@show');
Route::post('/user_user/create', 'App\Http\Controllers\User_userController@store');
Route::get('/user_user/archive', 'App\Http\Controllers\User_userController@archive');
Route::put('/user_user/update/{id}', 'App\Http\Controllers\User_userController@update');
Route::delete('/user_user/delete/{id}', 'App\Http\Controllers\User_userController@destroy');

Route::get('/users_roles', 'App\Http\Controllers\User_roleController@index');
Route::get('/user_role/{id}', 'App\Http\Controllers\User_roleController@show');
Route::post('/user_role/create', 'App\Http\Controllers\User_roleController@store');
Route::get('/user_role/archive', 'App\Http\Controllers\User_roleController@archive');
Route::put('/user_role/update/{id}', 'App\Http\Controllers\User_roleController@update');
Route::delete('/user_role/delete/{id}', 'App\Http\Controllers\User_roleController@destroy');

Route::get('/roles', 'App\Http\Controllers\RoleController@index');
Route::get('/role/{id}', 'App\Http\Controllers\RoleController@show');
Route::post('/role/create', 'App\Http\Controllers\RoleController@store');
Route::get('/role/archive', 'App\Http\Controllers\RoleController@archive');
Route::put('/role/update/{id}', 'App\Http\Controllers\RoleController@update');
Route::delete('/user/delete/{id}', 'App\Http\Controllers\RoleController@destroy');

Route::get('/roles_permissions', 'App\Http\Controllers\Role_permissionController@index');
Route::get('/role_permission/{id}', 'App\Http\Controllers\Role_permissionController@show');
Route::post('/role_permission/create', 'App\Http\Controllers\Role_permissionController@store');
Route::get('/role_permission/archive', 'App\Http\Controllers\Role_permissionController@archive');
Route::put('/role_permission/update/{id}', 'App\Http\Controllers\Role_permissionController@update');
Route::delete('/role_permission/delete/{id}', 'App\Http\Controllers\Role_permissionController@destroy');


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


Route::get('/subscriptions', 'App\Http\Controllers\SubscriptionController@index');
Route::get('/subscription/{id}', 'App\Http\Controllers\SubscriptionController@show');
Route::post('/subscription/create', 'App\Http\Controllers\SubscriptionController@store');
Route::get('/subscriptions/archive', 'App\Http\Controllers\SubscriptionController@archive');
Route::put('/subscription/update/{id}', 'App\Http\Controllers\SubscriptionController@update');
Route::delete('/subscription/delete/{id}', 'App\Http\Controllers\SubscriptionController@destroy');

Route::get('/payment_methods', 'App\Http\Controllers\Payment_methodController@index');
Route::get('/payment_method/{id}', 'App\Http\Controllers\Payment_methodController@show');
Route::post('/payment_method/create', 'App\Http\Controllers\Payment_methodController@store');
Route::get('/payment_methods/archive', 'App\Http\Controllers\Payment_methodController@archive');
Route::put('/payment_method/update/{id}', 'App\Http\Controllers\Payment_methodController@update');
Route::delete('/payment_method/delete/{id}', 'App\Http\Controllers\Payment_methodController@destroy');

Route::get('/receipts', 'App\Http\Controllers\ReceiptController@index');
Route::get('/receipt/{id}', 'App\Http\Controllers\ReceiptController@show');
Route::post('/receipt/create', 'App\Http\Controllers\ReceiptController@store');
Route::get('/receipts/archive', 'App\Http\Controllers\ReceiptController@archive');
Route::put('/receipt/update/{id}', 'App\Http\Controllers\ReceiptController@update');
Route::delete('/receipt/delete/{id}', 'App\Http\Controllers\ReceiptController@destroy');

Route::get('/servers', 'App\Http\Controllers\ServerController@index');
Route::get('/server/{id}', 'App\Http\Controllers\ServerController@show');
Route::post('/server/create', 'App\Http\Controllers\ServerController@store');
Route::get('/servers/archive', 'App\Http\Controllers\ServerController@archive');
Route::put('/server/update/{id}', 'App\Http\Controllers\ServerController@update');
Route::delete('/server/delete/{id}', 'App\Http\Controllers\ServerController@destroy');

Route::get('/song_servers', 'App\Http\Controllers\Song_serverController@index');
Route::get('/song_server/{id}', 'App\Http\Controllers\Song_serverController@show');
Route::post('/song_server/create', 'App\Http\Controllers\Song_serverController@store');
Route::get('/song_servers/archive', 'App\Http\Controllers\Song_serverController@archive');
Route::put('/song_server/update/{id}', 'App\Http\Controllers\Song_serverController@update');
Route::delete('/song_server/delete/{id}', 'App\Http\Controllers\Song_serverController@destroy');


Route::get('/likes', 'App\Http\Controllers\LikeController@index');
Route::get('/like/{id}', 'App\Http\Controllers\LikeController@show');
Route::post('/like/create', 'App\Http\Controllers\LikeController@store');
Route::get('/likes/archive', 'App\Http\Controllers\LikeController@archive');
Route::put('/like/update/{id}', 'App\Http\Controllers\LikeController@update');
Route::delete('/like/delete/{id}', 'App\Http\Controllers\LikeController@destroy');

Route::get('/playlists', 'App\Http\Controllers\PlaylistController@index');
Route::get('/playlist/{id}', 'App\Http\Controllers\PlaylistController@show');
Route::post('/playlist/create', 'App\Http\Controllers\PlaylistController@store');
Route::get('/playlists/archive', 'App\Http\Controllers\PlaylistController@archive');
Route::put('/playlist/update/{id}', 'App\Http\Controllers\PlaylistController@update');
Route::delete('/playlist/delete/{id}', 'App\Http\Controllers\PlaylistController@destroy');

Route::get('/songs_playlist', 'App\Http\Controllers\Song_playlistController@index');
Route::get('/song_playlist/{id}', 'App\Http\Controllers\Song_playlistController@show');
Route::post('/song_playlist/create', 'App\Http\Controllers\Song_playlistController@store');
Route::get('/songs_playlist/archive', 'App\Http\Controllers\Song_playlistController@archive');
Route::put('/song_playlist/update/{id}', 'App\Http\Controllers\Song_playlistController@update');
Route::delete('/song_playlist/delete/{id}', 'App\Http\Controllers\Song_playlistController@destroy');

Route::get('/users_playlist', 'App\Http\Controllers\User_playlistController@index');
Route::get('/user_playlist/{id}', 'App\Http\Controllers\User_playlistController@show');
Route::post('/user_playlist/create', 'App\Http\Controllers\User_playlistController@store');
Route::get('/users_playlist/archive', 'App\Http\Controllers\User_playlistController@archive');
Route::put('/user_playlist/update/{id}', 'App\Http\Controllers\User_playlistController@update');
Route::delete('/user_playlist/delete/{id}', 'App\Http\Controllers\User_playlistController@destroy');