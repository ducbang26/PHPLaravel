<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\HotelController;

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
    });
});
