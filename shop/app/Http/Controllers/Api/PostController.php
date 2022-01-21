<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Place;
use App\Models\PostImages;
use Validator;
use File;

class PostController extends Controller
{
    public $successStatus = 200;

    public function getAllPost() 
    {
        $data = Post::with(['postImage'])->get();

        return response()->json(['data' => $data], $this-> successStatus);
    }

    public function getPopularPost()
    {
        $data = Post::with(['postImage'])->where('popular', 1)->get();

        return response()->json(['data' => $data], $this-> successStatus);
    }

    public function postDetail($id) 
    { 
        try {

            $post = Post::with(['postImage'])->where('id', $id)->get();

            return response()->json(['data' => $post], $this-> successStatus);

        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => $e->getMessage(),'data'=>[]],500);
        }
    }

    public function getPostByUser() 
    { 
        $user = Auth::user();
        $posts = User::find($user->id)->posts()->with(['postImage'])->get();
        return response()->json(['data' => $posts], $this-> successStatus);
    }

    public function getPostByPlace(Request $request) 
    { 
        $posts = Place::find($request->place_id)->posts()->with(['postImage'])->get();
        return response()->json(['data' => $posts], $this-> successStatus);
    }

    public function createNewPost(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'place_id' => 'required', 
            'user_id' => 'required', 
            'content' => 'required',
            'star' => 'required', 
            'popular' => 'required',
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $post = Post::create([
            'place_id' => $request->place_id, 
            'user_id' => $request->user_id,
            'content' => $request->content,
            'star' => $request->star,
            'popular' => $request->popular
        ]);
        if($request->hasFile('images')){
            $files[] = $request->file('images');
            foreach ($files as $file){
                $post_image = new PostImages;
                $name = '/'.time() . '.' . $file->getClientOriginalExtension();
                // $request['post_id']=$post->id;
                // $request['image']=$name;
                $destinationPath = public_path('/uploads/post_images/');
                $file->move($destinationPath,$name);
                $post_image->post_id = $post->id;
                $post_image->image = $name;
                $post_image->save();
                // $post_image::create([
                //     'post_id' => $post->id,
                //     'image' => $name
                // ]);
            }
        } 
            return response()->json([
                'data'=>$post
        ], $this-> successStatus); 
    }
}
