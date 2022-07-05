<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if (empty($users)){
            return view('users')->with('users', $users);
        }
        return view('users')->with('users', $users);
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
        $newuser = new User();

        $validator = Validator::make(
            $request->all(),[
                'name' => 'required',
                'password' => 'required',
                'email' => 'required|regex:/^.+@.+$/i',
                'birthday' => 'required',
                'id_subscription' => 'required|integer'

            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $subscription = Subscription::find($request->id_subscription);
        if($subscription == NULL){
            return response()->json([
                'respuesta' => 'id de subscripcion invalido'
            ]);
        }else{
        $newuser->name_user = $request->name;
        $newuser->pass_user = $request->password;
        $newuser->email = $request->email;
        $newuser->birthday = $request->birthday;
        $newuser->id_subscription = $request->id_subscription;
        $newuser->save();
        return back();
        }
        
        
    }


    public function archive()
    {
        $users = User::onlyTrashed()->get();
        if (empty($users)){
            return response()->json(['message' => 'No archived users found'], 404);
        } else {
            return view('usertrash')->with('users', $users);
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
        $user = User::find($id);
        if(empty($user)){
            return response()->json(['message' => 'User not found'], 404);
        }
        return response($user, 200);
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
        $user = User::find($id);
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required',
                'password' => 'required',
                'email' => 'required|regex:/^.+@.+$/i',
                'birthday' => 'required',
                'id_subscription' => 'required|integer'
            ]
        );
        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        if($user == NULL){
            return response()->json([
                'respuesta' => 'id de usuario invalido'
            ]);
        }

        $subscription = Subscription::find($request->id_subscription);
        if($subscription == NULL){
            return response()->json([
                'respuesta' => 'id de subscripcion invalido'
            ]);
        }

        $user->name_user = $request->name;
        $user->pass_user = $request->password;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->id_subscription = $request->id_subscription;
        $user->save();
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::withTrashed() -> find($id);
        if (empty($user)) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->trashed()) {
            $user->forceDelete();
            return response()->json([
                'message' => 'User hard deleted',
                'id' => $user->id_user
                ], 200);
        } else {
            $user->delete();
            return back();
        }
    }

    public function restore($id)
    {
        $user = User::onlyTrashed() -> find($id);
        if (empty($user)) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->restore();
        return back();
    }

    public function restoreAll()
    {
        $user = User::onlyTrashed() -> get();
        if (empty($user)) {
            return response()->json(['message' => 'User not found'], 404);
        }

        foreach ($user as $user) {
            $user->restore();
        }

        return back();
    }
}