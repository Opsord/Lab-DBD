<?php

namespace App\Http\Controllers;

use App\Models\User_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class User_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_users = User_user::all();
        if ($users_users->isEmpty()){
            return response()->json([]);
        }
        return response($users_users, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newuser_user = new User_user();
        $validator = Validator::make(
            $request->all(),[
                'id_user1' => 'required|integer',
                'id_user2' => 'required|integer'
            ]
            );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $user1 = User::find($request->id_user1);
        $user2 = User::find($request->id_user2);
        if ($user1 == NULL){
            return response()->json([
                "respuesta" => 'Id de usuario 1 invalido'
            ]);
        }

        if ($user2 == NULL){
            return response()->json([
                "respuesta" => 'Id de usuario 2 invalido'
            ]);
        }

        if ($user1 == $user2){
            return response()->json([
                "respuesta" => 'Ids no pueden ser iguales'
            ]);
        }

        $newuser_user->id_user = $request->$user1;
        $newuser_user->id_user2 = $request->$user2;
        $newuser_user->save();
        return response()->json([
            'respuesta' => 'se ha creado la tupla usuario-usuario',
            'id' => $newuser_user->id_user_user,
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_user = User_user::find($id);
        if(empty($user_user)){
            return response()->json([]);
        }
        return response($user_user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
