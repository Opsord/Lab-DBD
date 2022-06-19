<?php

namespace App\Http\Controllers;

use App\Models\User_role;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class User_roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users_role = User_role::all();
        if ($users_role->isEmpty()){
            return response()->json([]);
        }
        return response($users_role, 200);
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
        $newuser_role = new User_role();
        $validator = Validator::make(
            $request->all(),[
                'id_user' => 'required|integer',
                'id_role' => 'required|integer'
            ]
            );
            if($validator->fails()){
                return response($validator->errors(), 400);
            }

            $user = User::find($request->id_user);
            $role = Role::find($request->id_role);
            if($user == NULL){
                return response()->json([
                    'respuesta' => 'id de usuario invalido'
                ]);
            }

            if($role == NULL){
                return response()->json([
                    'respuesta' => 'id de rol invalido'
                ]);
            }

            $newuser_role->id_user = $request->user;
            $newuser_role->id_role = $request->role;
            $newuser_role->save();
            return response()->json([
                'respuesta' => 'se ha creado una nueva tupla user-role',
                'id' => $newuser_role->id_user_role,
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
        $user_role = User_role::find($id);
        if(empty($user_role)){
            return response()->json([]);
        }
        return response($user_role, 200);
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
        $user_role = User_role::find($id);
        $validator = Validator::make(
            $request->all(),[
                'id_user' => 'required|integer',
                'id_role' => 'required|integer'
            ]
            );
            if($validator->fails()){
                return response($validator->errors(), 400);
            }

            $user = User::find($request->id_user);
            $role = Role::find($request->id_role);
            if($user == NULL){
                return response()->json([
                    'respuesta' => 'id de usuario invalido'
                ]);
            }

            if($role == NULL){
                return response()->json([
                    'respuesta' => 'id de rol invalido'
                ]);
            }

            $user_role->id_user = $request->user;
            $user_role->id_role = $request->role;
            $user_role->save();
            return response()->json([
                'respuesta' => 'se ha actualizado la tupla user-role',
                'id' => $user_role->id_user_role,
            ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_role = User_role::find($id);
        if (!$user_role) {
            return response()->json(['message' => 'User_role not found'], 404);
        }

        $user_role->delete();

        return response() -> json([
            'message' => 'User_role deleted',
            'id ' => $user_role->id_user_role
        ], 200);
    }

    public function archive()
    {
        
        $user_role = User_role::onlyTrashed()->get();
        if ($user_role->isEmpty()) {
            return response()->json(['message' => 'No archived User_role found'], 404);
        }
        return response($user_role, 200);
    }
}
