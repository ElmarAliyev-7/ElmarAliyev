<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\AuthController as BackAuthController;
use App\Http\Controllers\Front\AuthController as FrontAuthController;

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
        Route::get('/',      [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home',  [DashboardController::class, 'home'])->name('home');
        Route::get('/users', [DashboardController::class, 'users'])->name('users');
    });

    Route::group(['middleware' => 'isLogin'], function () {
        Route::get('/login',         [BackAuthController::class, 'login'])->name('login');
        Route::post('/login-submit', [BackAuthController::class, 'loginPost'])->name('login-submit');
    });

    Route::get('/logout', [BackAuthController::class, 'logOut'])->name('logout');
});
