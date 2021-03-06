<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        if (empty($roles)){
            return response()->json([]);
        }
        return response($roles, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newrole = new Role();

        $validator = Validator::make(
            $request->all(),[
                'role_name' => 'required'
            ]
            );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($request->role_name == "admin" || $request->role_name == "user"||$request->role_name == "artist"){   
            $newrole->name_role = $request->role_name;
            $newrole->save();
            return response()->json([
                'respuesta' => 'se ha creado un nuevo rol',
                'id' => $newrole->id_role,
            ], 201);
        }
        return response()->json([
            "respuesta" => 'rol invalido, debe ser admin, user o artist'
        ]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        if(empty($role)){
            return response()->json([]);
        }
        return response($role, 200);
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
        $role = Role::find($id);

        $validator = Validator::make(
            $request->all(),[
                'role_name' => 'required'
            ]
            );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($request->role_name == "admin" || $request->role_name == "user"||$request->role_name == "artist"){   
            $role->name_role = $request->role_name;
            $role->save();
            return response()->json([
                'respuesta' => 'se ha actualizado el rol',
                'id' => $role->id_role,
            ], 201);
        }
        return response()->json([
            "respuesta" => 'rol invalido, debe ser admin, user o artist'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::withTrashed() -> find($id);

        if (empty($role)) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        if ($role -> trashed()) {
            $role -> forceDelete();
            return response()->json([
                'message' => 'Role hard deleted',
                'id' => $role->id_role
                ], 204);
        } else {
            $role -> delete();
            return response()->json([
                'message' => 'Role soft deleted',
                'id' => $role->id_role
                ], 204);
        }
    }

    public function archive()
    {
        
        $role = Role::onlyTrashed()->get();
        if (empty($role)) {
            return response()->json(['message' => 'No archived Role found'], 404);
        } else {
            return response($role, 200);
        }
    }

    public function restore($id)
    {
        $role = Role::onlyTrashed() -> find($id);

        if (empty($role)) {
            return response()->json(['message' => 'Role not found'], 404);
        }

        if ($role -> trashed()) {
            $role -> restore();
            return response()->json([
                'message' => 'Role restored',
                'id' => $role->id_role
                ], 204);
        }
    }

    public function restoreAll()
    {
        $role = Role::onlyTrashed() -> get();

        if (empty($role)) {
            return response()->json(['message' => 'No archived Role found'], 404);
        }

        foreach ($role as $role) {
            $role -> restore();
        }

        return response()->json([
            'message' => 'All roles restored'
            ], 204);
    }
}
