<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\AuthController as BackAuthController;
use App\Http\Controllers\Front\AuthController as FrontAuthController;
use App\Http\Controllers\Back\PermissionController;
use App\Http\Controllers\Back\UserController;

//Front Routes
Route::get('/',          [HomeController::class, 'index'])->name('home');
Route::get('/about',     [HomeController::class, 'about'])->name('about');
Route::get('/projects',  [HomeController::class, 'projects'])->name('projects');
Route::get('/blogs',     [HomeController::class, 'blogs'])->name('blogs');
Route::get('/contact',   [HomeController::class, 'contact'])->name('contact');
Route::get('/register',  [FrontAuthController::class, 'register'])->name('register');
Route::post('/register', [FrontAuthController::class, 'registerPost'])->name('register-post');

//Back Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'notLogin'], function () {
        //Public routes for admins
        Route::get('/',            [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home',        [DashboardController::class, 'home'])->name('home');
        Route::get('/users',       [DashboardController::class, 'users'])->name('users');
        //Permission routes for SuperAdmin
        Route::group(['middleware' => 'isAdmin'], function () {
            Route::get('/permissions',          [DashboardController::class, 'permissions'])->name('permissions');
            Route::get('/add-permission/{id}',  [PermissionController::class, 'addPermission'])->name('add-permission');
            Route::post('/add-permission/{id}', [PermissionController::class, 'submitPermission'])->name('submit-permission');
        });
        //Create User
        Route::get('/create-user',      [UserController::class, 'create'])->name('create-user');
        Route::post('/create-user',     [UserController::class, 'createPost'])->name('create-user-post');
        //Delete User
        Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('delete-user');
    });

    Route::group(['middleware' => 'isLogin'], function () {
        Route::get('/login',         [BackAuthController::class, 'login'])->name('login');
        Route::post('/login-submit', [BackAuthController::class, 'loginPost'])->name('login-submit');
    });

    Route::get('/logout', [BackAuthController::class, 'logOut'])->name('logout');
});
