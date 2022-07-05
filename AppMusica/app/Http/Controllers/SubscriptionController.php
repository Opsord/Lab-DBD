<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Payment_method;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
        $Subscriptions = Subscription::orderby('id_subscription', 'ASC')->get();
        if (empty($Subscriptions)) {
            return response()->json(['message' => 'No Subscriptions found'], 404);
        }
        return view('subscription')->with('Subscriptions', $Subscriptions);
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

        $newSubs = new Subscription();

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
            if($request->state == "true" || $request->state == "false"){
                if($request->state == "true"){
                    $newSubs->state = 1;
                }else{
                    $newSubs->state = 0;
                }
                $newSubs->start_date = $request->start_date;
                $newSubs->end_date = $request->end_date;
                $newSubs->payment_method = $request->payment_method;
                $newSubs->save();
            }
            return back();
        }
    }


    public function archive()
    {
        //
        $Subscriptions = Subscription::onlyTrashed()->get();
        if (empty($Subscriptions)) {
            return response()->json(['message' => 'No archived Subscriptions found'], 404);
        } else {
            return view('subscriptiontrash')->with('Subscriptions', $Subscriptions);
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
        if (empty($Subscription)) {
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
        $subscription = Subscription::find($id);

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
        $subscription = Subscription::withTrashed() -> find($id);
        if (empty($subscription)) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }

        if ($subscription->trashed()) {
            $subscription->forceDelete();
            return response()->json([
                'respuesta' => 'Subscription hard deleted',
                'id' => $subscription->id_subscription,
            ], 200);
        } else {
            $subscription->delete();
            return back();
        }
    }

    public function restore($id)
    {
        //
        $subscription = Subscription::onlyTrashed() -> find($id);
        if (empty($subscription)) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }

        if ($subscription->trashed()) {
            $subscription->restore();
            return back();
        }
    }

    public function restoreAll()
    {
        //
        $subscriptions = Subscription::onlyTrashed() -> get();
        if (empty($subscriptions)) {
            return response()->json(['message' => 'No Subscriptions found'], 404);
        }

        foreach ($subscriptions as $subscription) {
            $subscription->restore();
        }
        return response()->json([
            'respuesta' => 'All Subscriptions restored',
        ], 200);
    }
}
