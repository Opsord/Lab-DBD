<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $distributors = Distributor::all();
        if ($distributors->isEmpty()) {
            return response()->json(['message' => 'No distributors found'], 404);
        }
        return response($distributors, 200);
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
        //
        $validator = Validator::make(
            $request->all(),[
                'name_distributor' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $newdistributor = new Distributor();
        $newdistributor->name_distributor = $request->name_distributor;
        $newdistributor->save();
        
        return response()->json([
            'respuesta' => 'nuevo distribuidor creado',
            'id' => $newdistributor->id_distributor,
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
        $distributor = Distributor::find($id);
        if (!$distributor) {
            return response()->json(['message' => 'Distributor not found'], 404);
        }
        return response($distributor, 200);
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
        $validator = Validator::make(
            $request->all(),[
                'name_distributor' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $distributor = Distributor::find($id);
        if (!$distributor) {
            return response()->json(['message' => 'Distributor not found'], 404);
        }

        $distributor->name_distributor = $request->name_distributor;
        $distributor->save();

        return response()->json([
            'respuesta' => 'distribuidor actualizado',
            'id' => $distributor->id_distributor, 200]);
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
        $distributor = Distributor::find($id);
        if (!$distributor) {
            return response()->json(['message' => 'Distributor not found'], 404);
        }

        $distributor->delete();

        return response()->json([
            'respuesta' => 'distribuidor eliminado',
            'id' => $distributor->id_distributor,
        ], 200);
    }
}
