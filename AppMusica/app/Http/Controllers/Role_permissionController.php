<?php

namespace App\Http\Controllers;

use App\Models\Role_permission;
use App\Models\Permission;
use App\Models\Role;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Role_permissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_permission = Role_permission::all();
        if ($role_permission->isEmpty()){
            return response()->json([]);
        }
        return response($role_permission, 200);
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
        $newrole_permission = new Role_permission();

        $validator = Validator::make(
            $request->all(), [
                'id_role' =>  'required|integer',
                'id_permission' => 'required|integer'
            ]
            );
            if($validator->fails()){
                return response($validator->errors(), 400);
            }
            $role = Role::find($request->id_role);
            $permission = Permission::find($request->id_permission);

            if($role == NULL){
                return response()->json([
                    'respuesta' => 'id de rol invalido'
                ]);
            }
            if($permission == NULL){
                return response()->json([
                    'respuesta' => 'id de permiso invalido'
            ]);
            }

            $newrole_permission->id_role = $request->role;
            $newrole_permission->id_permission = $request->permission;
            $newrole_permission->save();
            return response()->json([
                'respuesta' => 'se ha creado una nueva tupla rol-permiso',
                'id' => $newrole_permission->id_role_permission,
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
        $role_permission = Role_permission::find($id);
        if(empty($role_permission)){
            return response()->json([]);
        }
        return response($role_permission, 200);
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
        $role_permission = Role_permission::find($id);

        $validator = Validator::make(
            $request->all(), [
                'id_role' =>  'required|integer',
                'id_permission' => 'required|integer'
            ]
            );
            if($validator->fails()){
                return response($validator->errors(), 400);
            }
            $role = Role::find($request->id_role);
            $permission = Permission::find($request->id_permission);

            if($role == NULL){
                return response()->json([
                    'respuesta' => 'id de rol invalido'
                ]);
            }
            if($permission == NULL){
                return response()->json([
                    'respuesta' => 'id de permiso invalido'
            ]);
            }

            $role_permission->id_role = $request->role;
            $role_permission->id_permission = $request->permission;
            $role_permission->save();
            return response()->json([
                'respuesta' => 'se ha actualizado la tupla rol-permiso',
                'id' => $role_permission->id_role_permission,
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
        $role_permission = Role_permission::find($id);
        
        if (!$role_permission) {
            return response()->json(['message' => 'Role_permission intersection not found'], 404);
        }

        $role_permission->delete();

        return response() -> json([
            'message' => 'Role_permission intersection soft deleted',
            'id ' => $role_permission->id_role_permission
        ], 200);
    }

    public function archive()
    {
        
        $role_permission = Role_permission::onlyTrashed()->get();
        if ($role_permission->isEmpty()) {
            return response()->json(['message' => 'No archived Role_permission intersection found'], 404);
        }
        return response($role_permission, 200);
    }
}
