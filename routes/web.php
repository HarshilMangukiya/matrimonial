<?php

use Illuminate\Support\Facades\Route;


//- Admin
use App\Http\Controllers\ADMIN\LoginController as AdminLoginController;
use App\Http\Controllers\ADMIN\UserController as AdminUserController;

// -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*- users -*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*

use App\Http\Controllers\USER\LoginController;
use App\Http\Controllers\USER\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::prefix('admin')->group(function () {

    //- admin login
    Route::get('/',[AdminLoginController::class,'login'])->name('admin.login');
    Route::post('/login-process',[AdminLoginController::class,'loginProcess'])->name('admin.login.process');
    Route::get('/logout',[AdminLoginController::class,'logout'])->name('admin.logout');

    Route::group(["middleware" => "authAdmin"], function () {

        Route::get('/dashboard',[AdminLoginController::class,'dashboard'])->name('admin.dashboard');
        Route::get('/users',[AdminUserController::class,'index'])->name('admin.users');
        Route::post('/users-ajax',[AdminUserController::class,'ajax'])->name('admin.users.ajax');

    });
});

Route::prefix('user')->group(function () {
    
    //- users login
    Route::get('/',[LoginController::class,'login'])->name('user.login');
    Route::post('/login-process',[LoginController::class,'loginProcess'])->name('user.login.process');
    Route::get('/logout',[LoginController::class,'logout'])->name('user.logout');
    Route::get('/register',[LoginController::class,'register'])->name('user.register');
    Route::post('/user-save',[UserController::class,'save'])->name('user.save');

    Route::group(["middleware" => "auth"], function () {

        Route::get('/dashboard',[LoginController::class,'dashboard'])->name('user.dashboard');
        Route::get('/users',[UserController::class,'index'])->name('users');
        Route::post('/users-ajax',[UserController::class,'ajax'])->name('users.ajax');

    });
});