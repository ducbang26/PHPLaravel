<?php

namespace App\Http\Services\User;

use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function getAll()
    {
        return User::orderbyDesc('id')->paginate(20);
    }
    public function update($request, $users)
    {
        $users->status = $request->status;
        $users->save();
        $request->session()->flash('success', 'Cập nhật thành công trạng thái');
        return true;
    }
}
