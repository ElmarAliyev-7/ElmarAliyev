<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\{
    HomeController,
    AuthController,
};

Route::get('/',                [HomeController::class, 'index'])->name('home');
Route::get('/blogs',           [HomeController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}',     [HomeController::class, 'blog'])->name('blog');
Route::get('/projects',        [HomeController::class, 'projects'])->name('projects');
Route::get('/tasks',           [HomeController::class, 'tasks'])->name('tasks');
Route::get('/download-cv',     [HomeController::class, 'downloadCv'])->name('download-cv');
Route::post('/contact',        [HomeController::class, 'contact'])->name('contact');

Route::group(['middleware' => 'isNotSiteLogin'], function(){
    Route::match(['get', 'post'], '/login',      [AuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], '/register',   [AuthController::class, 'index'])->name('register');
});

Route::group(['middleware' => 'isSiteLogin'], function () {
    Route::post('/learn-question',        [HomeController::class, 'learnQuestion'])->name('learn-question');
    Route::put('/update-profile/{id}',    [AuthController::class, 'updateProfile'])->name('update-profile');
    Route::get('/profile',                [AuthController::class, 'profile'])->name('profile');
    Route::get('/task/{slug}',            [HomeController::class, 'task'])->name('task');
    Route::patch('/update-password/{id}', [AuthController::class, 'updatePassword'])->name('update-password');
    Route::get('/logout',                 [AuthController::class, 'logOut'])->name('logout');
});
