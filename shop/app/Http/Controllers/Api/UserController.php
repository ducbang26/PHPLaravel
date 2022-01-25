<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Place;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
use Validator;
use File;
use Hash;

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

    public function infoById( $id) 
    { 
        $user = User::where('id', $id)->get();
        return response()->json(['data' => $user], $this-> successStatus);
    }

    public function updateImage(Request $request) 
    {
        try {
            $validator = Validator::make($request->all(), [ 
            'profileImg' => 'nullable|image|mimes:jpg,png,jpeg'
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status'=>'false','message'=>$error,'data'=>[]], 422);            
            }

            $user = $request->user();
            if($request->hasFile('profileImg')){
                $image= $request->file('profileImg');
                $name = '/'.time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/profile_images/');
                $image->move($destinationPath,$name);
                $image_uploaded = $name;
            }
            else{
                $image_uploaded = $request->profileImg;
            }

            $user->update([
                'profileImg' => $image_uploaded,
            ]);

            return response()->json(['status'=>'Cap nhat thanh cong!'], $this-> successStatus);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
        }
    }

    public function updateInfo(Request $request) 
    {
        try {
            $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            ]);

            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status'=>'false','message'=>$error,'data'=>[]], 422);            
            }

            $user = $request->user();
            

            $user->update([
                'name' => $request->name
            ]);

            return response()->json(['status'=>'Cap nhat thanh cong!'], $this-> successStatus);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'status' => 'Da dang xuat!',
        ]);
    }

    public function changePassword(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [ 
                'old_password' => 'required',
                'password' => 'required', 
                'confirm_password' => 'required| same:password',
            ]);
    
            if ($validator->fails()) {
                $error = $validator->errors()->all()[0];
                return response()->json(['status'=>'false','message'=>$error,'data'=>[]], 422);            
            }
            $user = $request->user();
            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' =>bcrypt($request->password),
                ]);
                return response()->json(['status'=>'Doi mat khau thanh cong!'], $this-> successStatus);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
        }
    }

    public function getBookmark() 
    { 
        $user = Auth::user();
        $bookmarks = User::find($user->id)->places()->with(['placeImage'])->get();
        return response()->json(['data' => $bookmarks], $this-> successStatus);
    }

    public function bookmarkPlace(Request $request) 
    { 
        $user = Auth::user();
        User::find($user->id)->places()->attach($request->place_id);
        return response()->json(['data' => 'Da luu dia diem!'], $this-> successStatus);
    }

    public function unbookmarkPlace(Request $request) 
    { 
        $user = Auth::user();
        User::find($user->id)->places()->detach($request->place_id);
        return response()->json(['data' => 'Xoa khoi dia diem da luu!'], $this-> successStatus);
    }

    public function likePost(Request $request) 
    { 
        $user = Auth::user();
        //User::find($user->id)->posts()->attach($request->post_id);
        Like::insert([
            'user_id' => $user->id,
            'post_id' => $request->post_id
        ]);

        $like = Like::where('user_id', $user->id)->where('post_id', $request->post_id)->get();
        return response()->json(['data' => 'Da like bai viet!', 'like' => $like], $this-> successStatus);
    }

    public function unlikePost($id) 
    {
        Like::find($id)->delete();
        return response()->json(['data' => 'da unlike bai viet'], $this-> successStatus);
    }
}
