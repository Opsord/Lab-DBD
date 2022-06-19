<?php

namespace App\Http\Controllers;

use App\Models\Permission;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        if ($permissions->isEmpty()){
            return response()->json([]);
        }
        return response($permissions, 200);
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
        $validator = Validator::make(
            $request->all(),[
                'action' => 'required',
                'command' => 'required'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if ($request->action == NULL || $request->command == NULL){
            return response()->json([
                'respuesta' => 'action o comando sin definir'
            ]);
        }
        $newpermission = new Permission();
        $newpermission->action = $request->action;
        $newpermission->command = $request->command;
        $newpermission->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo permiso',
            'id' => $newpermission->id_permission,
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
        $permission = Permission::find($id);
        if(empty($permission)){
            return response()->json([]);
        }
        return response($permission, 200);
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
        $permission = Permission::find($id);

        $validator = Validator::make(
            $request->all(),[
                'action' => 'required',
                'command' => 'required'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if ($request->action == NULL || $request->command == NULL){
            return response()->json([
                'respuesta' => 'action o comando sin definir'
            ]);
        }
        
        $permission->action = $request->action;
        $permission->command = $request->command;
        $permission->save();
        return response()->json([
            'respuesta' => 'se ha actualizado el permiso',
            'id' => $permission->id_permission,
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
        $permission = Permission::find($id);
        if (!$permission) {
            return response()->json(['message' => 'permission not found'], 404);
        }

        $permission->delete();

        return response() -> json([
            'message' => 'permission deleted',
            'id ' => $permission->id_permission
        ], 200);
    }

    public function archive()
    {
        
        $permission = Permssion::onlyTrashed()->get();
        if ($permission->isEmpty()) {
            return response()->json(['message' => 'No Permission found'], 404);
        }
        return response($permission, 200);
    }
}
