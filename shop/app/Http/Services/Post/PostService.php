<?php

namespace App\Http\Services\Post;

use App\Models\Post;
use App\Models\Place;
use App\Models\User;
use App\Models\PostImages;
use App\Models\Report;

class PostService
{
    public function getPlace()
    {
        return Place::orderbyDesc('id')->paginate(20);
    }
    public function getUser()
    {
        return User::orderbyDesc('id')->paginate(20);
    }
    public function getReport()
    {
        return Report::orderbyDesc('id')->paginate(20);
    }
    public function getImage()
    {
        return PostImages::orderbyDesc('id')->paginate(20);
    }
    public function getImageById($id)
    {
        return PostImages::where('post_id',$id)->orderbyDesc('id')->paginate(20);
    }
    public function getAll()
    {
        return Post::orderbyDesc('id')->paginate(20);
    }
    public function update($request, $Posts)
    {
        $Posts->status = $request->status;
        $Posts->save();
        $request->session()->flash('success', 'Cập nhật thành công trạng thái');
        return true;
    }
}
