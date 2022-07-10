<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subscription;
use App\Models\User_role;
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
        $users = User::orderby('id_user', 'ASC')->get();
        $role = User_role::all();
        if (empty($users)){
            return view('users')->with('users', $users);
        }
        return view('users')->with('users', $users)->with('role', $role);
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
                'password' =>  [
                    'required',
                    'string',
                    'min:10',             // al menos de 10 caracteres
                    'regex:/[a-z]/',      // una letra minuscula
                    'regex:/[A-Z]/',      // una letra mayuscula
                    'regex:/[0-9]/',      // un numero del 1 al 9
                    'regex:/[@$!%*#?&]/', // debe tener un caracter especial
                ],
                'email' => 'required|regex:/^.+@.+$/i',
                'birthday' => 'required',
                'genre' => 'required',
                'id_subscription' => 'required|integer'

            ]
            
        );

        if($validator->fails()){
            return response($validator->errors(), 400);
        }

        $subscription = Subscription::find($request->id_subscription);
        $mail = User::where('email', $request->email)->first();
        if($mail != NULL){
            return back();
        }
        if($subscription == NULL){
            return response()->json([
                'respuesta' => 'id de subscripcion invalido'
            ]);
        }else{
        $newuser->name_user = $request->name;
        $newuser->pass_user = $request->password;
        $newuser->email = $request->email;
        $newuser->birthday = $request->birthday;
        $newuser->genre = $request->genre;
        $newuser->id_subscription = $request->id_subscription;
        $newuser->save();
        return back();
        }
        
        
    }

    public function storeReg(Request $request)
    {
        $newuser = new User();

        $validator = Validator::make(
            $request->all(),[
                'name' => 'required',
                'password' =>  [
                    'required',
                    'string',
                    'min:10',             // al menos de 10 caracteres
                    'regex:/[a-z]/',      // una letra minuscula
                    'regex:/[A-Z]/',      // una letra mayuscula
                    'regex:/[0-9]/',      // un numero del 1 al 9
                    'regex:/[@$!%*#?&]/', // debe tener un caracter especial
                ],
                'email' => 'required|regex:/^.+@.+$/i',
                'birthday' => 'required',
                'genre' => 'required',
                'id_subscription' => 'required|integer',
                'role' => 'required|integer'

            ]
            
        );

        if($validator->fails()){
            $error = 3;
            return view('login')->with('error', $error);

        }
        $mail = User::where('email', $request->email)->first();
        if ($mail != NULL){
            $error = 1;
            return view('login')->with('error', $error);
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
        $newuser->genre = $request->genre;
        $newuser->id_subscription = $request->id_subscription;
        $newuser->save();
        $role = new User_role();
        $role->id_user = $newuser->id_user;
        $role->id_role = $request->role;
        $role->save();
        $error = 2;
        return redirect('/')->with('error', $error);
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
                'password' => [
                    'required',
                    'string',
                    'min:10',             // al menos de 10 caracteres
                    'regex:/[a-z]/',      // una letra minuscula
                    'regex:/[A-Z]/',      // una letra mayuscula
                    'regex:/[0-9]/',      // un numero del 1 al 9
                    'regex:/[@$!%*#?&]/', // debe tener un caracter especial
                ],
                'email' => 'required|regex:/^.+@.+$/i',
                'birthday' => 'required',
                'genre' => 'required',
                'id_subscription' => 'required|integer',
                'role' => [
                    'required',
                    'max:1',
                    'regex:/[1-3]/',
                ]
            ]
        );
        if($validator->fails()){
            return back();
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
        $user->genre = $request->genre;
        $user->id_subscription = $request->id_subscription;
        $user->save();

        $role = User_role::where('id_user', $id)->first();
        $role->id_role = $request->role;
        $role->save();
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