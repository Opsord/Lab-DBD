<?php

namespace App\Http\Controllers;

use App\Models\Geographic_restriction;

use Illuminate\Http\Request;

class Geographic_restrictionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $geographic_restrictions = Geographic_restriction::all();
        if ($geographic_restrictions->isEmpty()) {
            return response()->json(['message' => 'No geographic_restrictions found'], 404);
        }
        return response($geographic_restrictions, 200);
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
                'name_geographic_restriction' => 'required',
            ]
        );

        $newgeographic_restriction = new Geographic_restriction();
        $newgeographic_restriction->name_geographic_restriction = $request->name_geographic_restriction;
        $newgeographic_restriction->save();

        return response()->json([
            'respuesta' => 'nueva restriccion geografica agregada',
            'id' => $newgeographic_restriction->id_geographic_restriction,
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
        $geographic_restriction = Geographic_restriction::find($id);
        if (!$geographic_restriction) {
            return response()->json(['message' => 'Geographic_restriction not found'], 404);
        }
        return response($geographic_restriction, 200);
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
                'name_geographic_restriction' => 'required',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $geographic_restriction = Geographic_restriction::find($id);
        if (!$geographic_restriction) {
            return response()->json(['message' => 'Geographic_restriction not found'], 404);
        }

        $geographic_restriction->name_geographic_restriction = $request->name_geographic_restriction;
        $geographic_restriction->save();

        return response()->json([
            'respuesta' => 'restriccion geografica actualizada',
            'id' => $geographic_restriction->id_geographic_restriction,
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
        $geographic_restriction = Geographic_restriction::find($id);
        if (!$geographic_restriction) {
            return response()->json(['message' => 'Geographic_restriction not found'], 404);
        }

        $geographic_restriction->delete();

        return response()->json([
            'respuesta' => 'restriccion geografica eliminada',
            'id' => $geographic_restriction->id_geographic_restriction,
        ], 200);
    }
}
