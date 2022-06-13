<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Servers = Server::all();
        if ($Servers->isEmpty()) {
            return response()->json(['message' => 'No Servers found'], 404);
        }
        return response($Servers);
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
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required',
                'ubicacion' => 'required'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $newserver = new Server();
        $newserver->name_server = $request->name;
        $newserver->ubicacion = $request->ubicacion;
        $newserver->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo servidor',
            'id' => $newserver->id_server,
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
        //
        $Server = Server::find($id);
        if (!$Server) {
            return response()->json(['message' => 'Server not found'], 404);
        }
        return response($Server);
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
        $server = Server::find($id);

        $validator = Validator::make(
            $request->all(),[
                'name' => 'required',
                'ubicacion' => 'required'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        
        if($server == NULL){
            return response()->json([
                'respuesta' => 'id de servidor invalido'
            ]);
        }

        $server->name_server = $request->name;
        $server->ubicacion = $request->ubicacion;
        $server->save();
        return response()->json([
            'respuesta' => 'se han actualizado los datos del servidor',
            'id' => $server->id_server,
        ], 200);
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
