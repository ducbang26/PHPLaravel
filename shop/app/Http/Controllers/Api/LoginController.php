<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    public $successStatus = 200;
    public function login(Request $request)
    {
        try {
            $login = $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
         
            if(Auth::attempt($login)){ 
                $user = Auth::user(); 
                $success['token'] =  $user->createToken('MyApp')-> accessToken; 
                return response()->json(['success' => $success], $this-> successStatus); 
            } 
            else{ 
                return response()->json(['error'=>'Unauthorised'], 401); 
            } 
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
        }
    }

    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        } 
        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json([
                'success'=>$success,
                'data'=>$user
        ], $this-> successStatus); 
    }

    public function info() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
}
