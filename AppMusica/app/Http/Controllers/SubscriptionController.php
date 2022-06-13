<?php

namespace App\Http\Controllers;

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
        $validator = Validator::make(
            $request->all(),[
                'state' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ]
            
        );
        $newSubs = new Payment_method();
        $newSubs->state = $request->state;
        $newSubs->start_date = $request->start_date;
        $newSubs->end_date = $request->end_date;
        //como se hace con las llaves foraneas? asdada
        
        $newSubs->save();
        return response()->json([
            'respuesta' => 'se ha creado una nueva subscripción',
            'id' => $newSubs->id_subscription,
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
