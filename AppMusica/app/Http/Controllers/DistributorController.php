<?php

namespace App\Http\Controllers;

use App\Models\Distributor;

use Illuminate\Support\Facades\Validator;
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
        if (empty($distributors)) {
            return response()->json(['message' => 'No distributors found'], 404);
        }
        return response($distributors, 200);
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
            'respuesta' => 'New distributor created',
            'id' => $newdistributor->id_distributor
        ], 201);
    }

    public function archive()
    {
        $distributors = Distributor::onlyTrashed()->get();

        if (empty($distributors)) {
            return response()->json(['message' => 'No archived distributors found'], 404);
        } else {
            return response($distributors, 200);
        }
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
        if (empty($distributor)) {
            return response()->json(['message' => 'Distributor not found'], 404);
        }
        return response($distributor, 200);
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
        if (empty($distributor)) {
            return response()->json(['message' => 'Distributor not found'], 404);
        }

        $distributor->name_distributor = $request->name_distributor;
        $distributor->save();

        return response()->json([
            'respuesta' => 'Distributor updated',
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
        $distributor = Distributor::withTrashed() -> find($id);

        if(empty($distributor)) {
            return response()->json(['message' => 'Distributor not found'], 404);
        }

        if ($distributor -> trashed()){
            $distributor -> forceDelete();
            return response()->json([
                'message' => 'Distributor hard deleted',
                'id' => $distributor->id_distributor
            ], 200);
        } else {
            $distributor -> delete();
            return response()->json([
                'message' => 'Distributor soft deleted',
                'id' => $distributor->id_distributor
            ], 200);
        }
    }

    public function restore($id)
    {
        $distributor = Distributor::onlyTrashed() -> find($id);

        if(empty($distributor)) {
            return response()->json(['message' => 'Distributor not found'], 404);
        }

        $distributor -> restore();
        return response()->json([
            'message' => 'Distributor restored',
            'id' => $distributor->id_distributor
        ], 200);
    }

    public function restoreAll()
    {
        $distributors = Distributor::onlyTrashed() -> get();

        if(empty($distributors)) {
            return response()->json(['message' => 'No distributors found'], 404);
        }
        
        foreach ($distributors as $distributor) {
            $distributor -> restore();
        }

        return response()->json([
            'message' => 'Distributors restored',
            'distributors' => $distributors
            ], 200);
    }
}