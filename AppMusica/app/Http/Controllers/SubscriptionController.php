<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Payment_method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Subscriptions = Subscription::all();
        if ($Subscriptions->isEmpty()) {
            return response()->json(['message' => 'No Subscriptions found'], 404);
        }
        return response($Subscriptions);
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

        $newSubs = new Payment_method();

        $validator = Validator::make(
            $request->all(),[
                'state' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'payment_method' => 'required|integer'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $payMeth = Payment_method::find($request->payment_method);
        if($payMeth == NULL){
            return response()->json([
                'respuesta' => 'id del metodo de pago invalido'
            ]);
        }else{
        
            $newSubs->state = $request->state;
            $newSubs->start_date = $request->start_date;
            $newSubs->end_date = $request->end_date;
            $newSubs->payment_method = $request->payment_method;
            $newSubs->save();
            return response()->json([
                'respuesta' => 'se ha creado una nueva subscripción',
                'id' => $newSubs->id_subscription,
            ], 201);
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
        $Subscription = Subscription::find($id);
        if (!$Subscription) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }
        return response($Subscription);
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
        $subscription = Payment_method::find($id);

        $validator = Validator::make(
            $request->all(),[
                'state' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'payment_method' => 'required|integer'
            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($subscription == NULL){
            return response()->json([
                'respuesta' => 'id de subscripción invalido'
            ]);
        }

        $payMeth = Payment_method::find($request->payment_method);
        if($payMeth == NULL){
            return response()->json([
                'respuesta' => 'id del metodo de pago invalido'
            ]);
        }else{
        
            $subscription->state = $request->state;
            $subscription->start_date = $request->start_date;
            $subscription->end_date = $request->end_date;
            $subscription->payment_method = $request->payment_method;
            $subscription->save();
            return response()->json([
                'respuesta' => 'se ha actualizado una nueva subscripción',
                'id' => $subscription->id_subscription,
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
    }
}
