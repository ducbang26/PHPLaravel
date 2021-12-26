<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
use File;

class UserController extends Controller
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
                return response()->json(['data' => $success], $this-> successStatus); 
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
        return response()->json(['data' => $user], $this-> successStatus); 
    } 

    public function updateInfo(Request $request) 
    {
        try {
            $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'profileImg' => 'nullable|image|mimes:jpg,png,jpeg',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status'=>'false','message'=>$error,'data'=>[]], 422);            
            }

            $user = $request->user();
            if($request->hasFile('profileImg')){
                if ($user->profileImg) {
                    $old_path = public_path().'/uploads/profile_images'.$user->profileImg;
                    if(File::exists($old_path)){
                        File::delete($old_path);
                    }
                }
                $image_name = 'profile-image-'.time().'.'.$request->profileImg->extension();
                $request->profileImg->move(public_path('/uploads/profile_images'),$image_name);
            }else{
                $image_name = $user->profileImg;
            }

            $user->update([
                'name' => $request->name,
                'profileImg' => $request->profileImg
            ]);

            return response()->json(['status'=>'Cap nhat thanh cong!'], $this-> successStatus);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
        }
    }
}
