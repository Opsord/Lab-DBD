<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Login;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newlog = new Login();

        $validator = Validator::make(
            $request->all(),[
                'password' => 'required',
                'email' => 'required|regex:/^.+@.+$/i'
            ]
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();
        if($user == NULL){
            return response()->json([
                'respuesta' => 'el correo no existe'
            ]);
        }
        if($user->pass_user == $request->password){
            $newlog->name_user = $user->name_user;
            $newlog->pass_user = $request->password;
            $newlog->email = $request->email;
            $newlog->save();
            return redirect('/welcome2');
        }else{
            return back();
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
