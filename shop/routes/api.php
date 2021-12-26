<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;

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

Route::post('login', 'App\Http\Controllers\Api\LoginController@login');
Route::post('register', 'App\Http\Controllers\Api\LoginController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('info', 'App\Http\Controllers\Api\LoginController@info');
    Route::post('updateInfo', 'App\Http\Controllers\Api\LoginController@updateInfo');
});