<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Place;
use App\Models\PostImages;

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
}
