<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Hệ Thống'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter', 
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {

            $user = Auth::user();

            session(['userAvatar' => $user->profileImg]);
            session(['userFullname' => $user->name]);
            session(['userId' => $user->id]);

            if($user->isAdmin==1){
                return redirect()->route('admin');
            }
        }

        Session::flash('error', 'Email hoặc Password không chính xác');

        return redirect()->back();
    }
    
}
