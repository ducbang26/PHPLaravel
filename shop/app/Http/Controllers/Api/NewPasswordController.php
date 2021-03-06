<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Notifications\ResetPasswordNotification;

class NewPasswordController extends Controller
{
     public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $passwordReset = PasswordReset::insert([
            'email' => $user->email,
            'token' => Str::random(60),
            'user_id' => $user->id,
        ]);
        $sendMail = PasswordReset::where('user_id', $user->id)->firstOrFail();
        if ($passwordReset) {
            $user->notify(new ResetPasswordNotification($sendMail->token));
        }
        return response()->json([
        'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    public function reset(Request $request, $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $data = User::find($user->id);
        $data->password = bcrypt($request->password);

        return response()->json([
            'message' => 'doi mat khau thanh cong',
        ]);
    }
    
}