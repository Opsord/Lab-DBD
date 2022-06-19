<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use App\Models\Payment_method;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Receipts = Receipt::all();
        if ($Receipts->isEmpty()) {
            return response()->json(['message' => 'No Receipts found'], 404);
        }
        return response($Receipts);
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
        $newReceipt = new Receipt();
        
        $validator = Validator::make(
            $request->all(),[
                'amount' => 'required',
                'used_method' => 'required|integer'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        
        $PayMeth = Payment_method::find($request->used_method);

        if($PayMeth == NULL){
            return response()->json([
                'respuesta' => 'id de metodo de pago invalido'
            ]);
        }else{
            $newReceipt->amount = $request->amount;
            $newReceipt->used_method = $request->used_method;
            $newReceipt->save();
            return response()->json([
                'respuesta' => 'se ha creado una nueva boleta de pago',
                'id' => $newReceipt->id_receipt,
            ], 201);
        }
    }


    public function archive()
    {
        //
        $Receipt = Receipt::onlyTrashed()->get();
        if ($Receipt->isEmpty()) {
            return response()->json(['message' => 'No archived Receipts found'], 404);
        }
        return response($Receipt, 200);
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
        $Receipt = Receipt::find($id);
        if (!$Receipt) {
            return response()->json(['message' => 'Receipt not found'], 404);
        }
        return response($Receipt);
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
        $receipt = Receipt::find($id);
        
        $validator = Validator::make(
            $request->all(),[
                'amount' => 'required',
                'used_method' => 'required|integer'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }
        
        if($receipt == NULL){
            return response()->json([
                'respuesta' => 'id de la boleta invalido'
            ]);
        }

        $PayMeth = Payment_method::find($request->used_method);

        if($PayMeth == NULL){
            return response()->json([
                'respuesta' => 'id de metodo de pago invalido'
            ]);
        }else{
            $receipt->amount = $request->amount;
            $receipt->used_method = $request->used_method;
            $receipt->save();
            return response()->json([
                'respuesta' => 'se ha actualizado la boleta de pago',
                'id' => $receipt->id_receipt,
            ], 200);
        }
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
        $receipt = Receipt::find($id);

        if (!$receipt) {
            return response()->json(['message' => 'Receipt not found'], 404);
        }

        $receipt->delete();

        return response()->json([
            'message' => 'Receipt soft deleted',
            'id' => $receipt->id_receipt,
        ], 200);
    }
}
