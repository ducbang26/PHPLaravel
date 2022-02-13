<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\PlacesController;
use App\Http\Controllers\Admin\UsersController;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/users/login/store', [LoginController::class, 'store']);
Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        //Hotel
        Route::prefix('hotels')->group(function () {
            Route::get('add', [HotelController::class, 'create']);
            Route::post('add', [HotelController::class, 'store']);
            Route::get('list', [HotelController::class, 'index']);
            Route::get('edit/{hotel}', [HotelController::class, 'show']);
            Route::post('edit/{hotel}', [HotelController::class, 'update']);
            Route::DELETE('destroy', [HotelController::class, 'destroy']);
        });
        Route::prefix('users')->group(function () {
            Route::get('list', [UsersController::class, 'index']);
            Route::get('edit/{user}', [UsersController::class, 'show']);
            Route::get('active/{user}', [UsersController::class, 'active']);
        });
        Route::prefix('posts')->group(function () {
            Route::get('list', [PostsController::class, 'index']);
            Route::get('unactive/{post}', [PostsController::class, 'unactive']);
            Route::get('show/{post}', [PostsController::class, 'show']);
            Route::get('active/{post}', [PostsController::class, 'active']);
            Route::get('popular/{post}', [PostsController::class, 'popular']);
            Route::get('unpopular/{post}', [PostsController::class, 'unpopular']);
            Route::get('report', [PostsController::class, 'report']);
            Route::get('reportShow/{report}', [PostsController::class, 'reportShow']);
        });
        Route::prefix('places')->group(function () {
            Route::get('list', [PlacesController::class, 'index']);
            Route::get('show/{places}', [PlacesController::class, 'show']);
            Route::get('popular/{places}', [PlacesController::class, 'popular']);
            Route::get('unpopular/{places}', [PlacesController::class, 'unpopular']);
        });
    });
});
