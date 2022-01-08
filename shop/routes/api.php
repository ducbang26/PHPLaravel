<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'App\Http\Controllers\Api\UserController@login');
Route::post('register', 'App\Http\Controllers\Api\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('info', 'App\Http\Controllers\Api\UserController@info');
    Route::post('info/updateInfo', 'App\Http\Controllers\Api\UserController@updateInfo');
    Route::post('info/updateImage', 'App\Http\Controllers\Api\UserController@updateImage');
    Route::post('info/change-Password', 'App\Http\Controllers\Api\UserController@changePassword');
    Route::delete('logout', 'App\Http\Controllers\Api\UserController@logout');
});

Route::post('reset-password', 'App\Http\Controllers\Api\NewPasswordController@sendMail');
Route::post('reset-password/{token}', 'App\Http\Controllers\Api\NewPasswordController@reset');
