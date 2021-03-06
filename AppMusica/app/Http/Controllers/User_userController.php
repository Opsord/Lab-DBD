<?php

namespace App\Http\Controllers;

use App\Models\User_user;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
        if (empty($users_users)){
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
            return response()->json(['respuesta' => 'User_user intersection not found']);
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
        $user_user = User_user::find($id);

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

        $user_user->id_user = $request->$user1;
        $user_user->id_user2 = $request->$user2;
        $user_user->save();
        return response()->json([
            'respuesta' => 'se ha actualizado la tupla usuario-usuario',
            'id' => $user_user->id_user_user,
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function archive()
    {
        
        $user_user = User_user::onlyTrashed()->get();
        if (empty($user_user)) {
            return response()->json(['message' => 'No archived User_user found'], 404);
        } else {
            return response($user_user, 200);
        }
    }
    
    public function destroy($id)
    {
        $user_user = User_user::withTrashed() -> find($id);
        if (empty($user_user)) {
            return response()->json(['message' => 'User_user not found'], 404);
        }

        if ($user_user->trashed()) {
            $user_user->forceDelete();
            return response()->json([
                'message' => 'User_user hard deleted',
                'id' => $user_user->id_user_user,
                ], 200);
        } else {
            $user_user->delete();
            return response()->json([
                'message' => 'User_user soft deleted',
                'id' => $user_user->id_user_user,
                ], 200);
        }
    }

    public function restore($id)
    {
        $user_user = User_user::onlyTrashed() -> find($id);
        if (empty($user_user)) {
            return response()->json(['message' => 'User_user not found'], 404);
        }

        $user_user->restore();
        return response()->json([
            'message' => 'User_user restored',
            'id' => $user_user->id_user_user,
            ], 200);
    }

    public function restoreAll()
    {
        $user_user = User_user::onlyTrashed() -> get();
        if (empty($user_user)) {
            return response()->json(['message' => 'No archived User_user found'], 404);
        }
        foreach ($user_user as $user_user) {
            $user_user->restore();
        }
        return response()->json([
            'message' => 'All User_user restored',
            ], 200);
    }
}
