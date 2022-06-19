<?php

namespace App\Http\Controllers;

use App\Models\Payment_method;

use Illuminate\Support\Facades\Validator;
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

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

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


    public function archive()
    {
        //
        $Payment_method = Payment_method::onlyTrashed()->get();
        if ($Payment_method->isEmpty()) {
            return response()->json(['message' => 'No archived Payment_methods found'], 404);
        }
        return response($Payment_method, 200);
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

        $PayMeth = Payment_method::find($id);

        $validator = Validator::make(
            $request->all(),[
                'alias' => 'required',
                'holder' => 'required',
                'card_number' => 'required',
                'date' => 'required',
                'security_code' => 'required'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        
        if($PayMeth == NULL){
            return response()->json([
                'respuesta' => 'id del metodo de pago es invalido'
            ]);
        }

        $PayMeth->card_alias = $request->alias;
        $PayMeth->card_holder = $request->holder;
        $PayMeth->card_number = $request->number;
        $PayMeth->expiration_date = $request->date;
        $PayMeth->security_code = $request->security_code;
        $PayMeth->save();
        return response()->json([
            'respuesta' => 'se ha actualizado el metodo de pago',
            'id' => $PayMeth->id_method,
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
        $PayMeth = Payment_method::find($id);

        if (!$PayMeth) {
            return response()->json(['message' => 'PaymentMethod not found'], 404);
        }

        $PayMeth->delete();

        return response()->json([
            'respuesta' => 'metodo de pago eliminado',
            'id' => $PayMeth->id_method,
        ], 200);
    }
}
