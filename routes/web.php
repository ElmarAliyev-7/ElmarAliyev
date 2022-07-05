<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\AuthController;

//Front Routes
Route::get('/',          [HomeController::class, 'index'])->name('home');
Route::get('/about',     [HomeController::class, 'about'])->name('about');
Route::get('/projects',  [HomeController::class, 'projects'])->name('projects');
Route::get('/blogs',     [HomeController::class, 'blogs'])->name('blogs');
Route::get('/contact',   [HomeController::class, 'contact'])->name('contact');
Route::get('/register',  [HomeController::class, 'register'])->name('register');
Route::post('/register', [HomeController::class, 'registerPost'])->name('register-post');

//Back Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'notLogin'], function () {
        Route::get('/',     [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home', [DashboardController::class, 'home'])->name('home');
    });

    Route::group(['middleware' => 'isLogin'], function () {
        Route::get('/login',         [AuthController::class, 'login'])->name('login');
        Route::post('/login-submit', [AuthController::class, 'loginPost'])->name('login-submit');
    });

    Route::get('/logout', [AuthController::class, 'logOut'])->name('logout');
});
