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
    Route::get('bookmarks', 'App\Http\Controllers\Api\UserController@getBookmark');
    Route::post('bookmark-place', 'App\Http\Controllers\Api\UserController@bookmarkPlace');
    Route::post('unbookmark-place', 'App\Http\Controllers\Api\UserController@unbookmarkPlace');
    Route::get('post-by-user', 'App\Http\Controllers\Api\PostController@getPostByUser');
});

Route::post('reset-password', 'App\Http\Controllers\Api\NewPasswordController@sendMail');
Route::post('reset-password/{token}', 'App\Http\Controllers\Api\NewPasswordController@reset');
Route::get('places', 'App\Http\Controllers\Api\PlaceController@getAllPlace');
Route::get('places/search/{placeName}', 'App\Http\Controllers\Api\PlaceController@searchPlace');
Route::get('places/filter/{region}', 'App\Http\Controllers\Api\PlaceController@searchPlaceByRegion');
Route::get('popularPlaces', 'App\Http\Controllers\Api\PlaceController@getPopularPlace');
Route::get('places/{id}', 'App\Http\Controllers\Api\PlaceController@placeDetail');
Route::get('posts', 'App\Http\Controllers\Api\PostController@getAllPost');
Route::get('posts/{id}', 'App\Http\Controllers\Api\PostController@postDetail');
Route::get('post-by-place/{place_id}', 'App\Http\Controllers\Api\PostController@getPostByPlace');


