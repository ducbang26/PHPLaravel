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
    public function updateInfo(Request $request) 
    {
        try {
            $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email'.$request->user()->id, 
            'profileImg' => 'nullable|image', 
            ]);
            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status'=>'false','message'=>$error,'data'=>[]], 422);            
            }else {
                $user = User::find($request->user()->id);
                $user->name = $request->name;
                $user->email = $request->email;

                if ($request->profileImg && $request->profileImg->isvalid()) {
                    $filename = time().'.'.$request->profileImg->extenction();
                    $request->profileImg->move(public_path('images'),$filename);
                    $path = 'public/images/$filemane';
                    $user->profileImg = $path;
                }
                $user->update();
                return response()->json([
                    'success'=>'Profile da duoc cap nhat',
                    'data'=>$user
                ], $this-> successStatus);
            } 
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
        }
    }
}
