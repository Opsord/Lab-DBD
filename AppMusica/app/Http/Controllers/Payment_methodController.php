<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Payment_methodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Payment_methods = Payment_method::all();
        if ($Payment_methods->isEmpty()) {
            return response()->json(['message' => 'No Payment_methods found'], 404);
        }
        return response($Payment_methods);
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
                'alias' => 'required',
                'holder' => 'required',
                'card_number' => 'required',
                'date' => 'required',
                'security_code' => 'required'
            ]
            
        );
        $newPayMeth = new Payment_method();
        $newPayMeth->card_alias = $request->alias;
        $newPayMeth->card_holder = $request->holder;
        $newPayMeth->card_number = $request->number;
        $newPayMeth->expiration_date = $request->date;
        $newPayMeth->security_code = $request->security_code;
        $newPayMeth->save();
        return response()->json([
            'respuesta' => 'se ha creado un nuevo metodo de pago',
            'id' => $newPayMeth->id_method,
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
        $Payment_method = Payment_method::find($id);
        if (!$Payment_method) {
            return response()->json(['message' => 'Payment method not found'], 404);
        }
        return response($Payment_method);
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
