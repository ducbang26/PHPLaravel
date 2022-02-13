<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateFormRequest;

use App\Http\Services\User\UserService;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view('admin.users.list', [
            'title' => 'Danh Sách Người Dùng',
            'users' => $this->userService->getAll()
        ]);
    }
    public function update(Request $request, User $user)
    {
        $user->update(['status'=>$request->status]);
        return redirect('/admin/users/list');
    }
    public function show(User $user)
    {
        $user->status=0;
        $user->update();
        return redirect('/admin/users/list');
    }
    public function active(User $user)
    {
        $user->status=1;
        $user->update();
        return redirect('/admin/users/list');
    }
}
