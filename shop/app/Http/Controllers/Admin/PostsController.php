<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Services\Post\PostService;
use App\Models\Post;
use App\Models\Report;
class PostsController extends Controller
{
    protected $userService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function show(Post $post)
    {
        return view('admin.posts.show', [
            'title' => 'Xem Bài Viết ',
            'posts' => $post,
            'places' => $this->postService->getPlace(),
            'users'=>$this->postService->getUser(),
            'postimages'=>$this->postService->getImageById($post->id)
        ]);
    }
    public function reportShow(Report $report)
    {
        return view('admin.posts.reportShow', [
            'title' => 'Xem Bài Viết ',
            'posts' => $this->postService->getAll(),
            'reports'=>$report,
            'places' => $this->postService->getPlace(),
            'users'=>$this->postService->getUser(),
            'postimages'=>$this->postService->getImage()
        ]);
    }
    public function report()
    {
        return view('admin.posts.reportList', [
            'title' => 'Tố Cáo Bài Viết ',
            'reports' => $this->postService->getReport(),
        ]);
    }
    public function index()
    {
        return view('admin.posts.list', [
            'title' => 'Danh Sách Bài Viết',
            'posts' => $this->postService->getAll()
        ]);
    }
    public function unactive(Post $post)
    {
        $post->status=0;
        $post->update();
        return redirect('/admin/posts/list');
    }
    public function active(Post $post)
    {
        $post->status=1;
        $post->update();
        return redirect('/admin/posts/list');
    }
    public function unpopular(Post $post)
    {
        $post->popular=0;
        $post->update();
        return redirect('/admin/posts/list');
    }
    public function popular(Post $post)
    {
        $post->popular=1;
        $post->update();
        return redirect('/admin/posts/list');
    }

}
