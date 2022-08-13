<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController as FrontHomeController;
use App\Http\Controllers\Front\AuthController as FrontAuthController;
use App\Http\Controllers\Back\AuthController as BackAuthController;
use App\Http\Controllers\Back\HomeController as BackHomeController;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\PermissionController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\SkillController;
use App\Http\Controllers\Back\ExperienceController;
use App\Http\Controllers\Back\PortfolioController;

//Front Routes
Route::get('/',          [FrontHomeController::class, 'index'])->name('home');
Route::get('/projects',  [FrontHomeController::class, 'projects'])->name('projects');
Route::get('/blogs',     [FrontHomeController::class, 'blogs'])->name('blogs');
Route::get('/register',  [FrontAuthController::class, 'register'])->name('register');
Route::post('/register', [FrontAuthController::class, 'registerPost'])->name('register-post');
Route::get('download-cv',[FrontHomeController::class, 'downloadCv'])->name('download-cv');

//Back Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'notLogin'], function () {
        //Public routes for admins
        Route::get('/',            [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home',        [DashboardController::class, 'home'])->name('home');
        Route::get('/users',       [DashboardController::class, 'users'])->name('users');
        Route::get('/skills',      [DashboardController::class, 'skills'])->name('skills');
        Route::get('/about',       [DashboardController::class, 'about'])->name('about');
        Route::get('/experience',  [DashboardController::class, 'experience'])->name('experience');
        Route::get('/portfolio',   [DashboardController::class, 'portfolio'])->name('portfolio');
        Route::post('/home',       [BackHomeController::class, 'index'])->name('home-page');
        Route::post('/about',      [BackHomeController::class, 'about'])->name('about-post');
        //Skills
        Route::get('/my-skills',        [SkillController::class, 'create'])->name('my-skills');
        Route::post('my-skills',        [SkillController::class, 'createPost'])->name('skill-post');
        Route::get('delete-skill/{id}', [SkillController::class, 'delete'])->name('delete-skill');
        //Experience & Education
        Route::get('/add-experience',        [ExperienceController::class, 'create'])->name('add-experience');
        Route::post('/add-experience',       [ExperienceController::class, 'createPost'])->name('experience-post');
        Route::get('delete-experience/{id}', [ExperienceController::class, 'delete'])->name('delete-exp');
        //Portfolio
        Route::get('/add-project',   [PortfolioController::class, 'create'])->name('add-project');
        Route::post('/add-project',  [PortfolioController::class, 'createPost'])->name('project-post');
        Route::get('delete-project/{id}', [PortfolioController::class, 'delete'])->name('delete-project');
        //Permission routes for SuperAdmin
        Route::group(['middleware' => 'isAdmin'], function () {
            Route::get('/permissions',          [DashboardController::class, 'permissions'])->name('permissions');
            Route::get('/add-permission/{id}',  [PermissionController::class, 'addPermission'])->name('add-permission');
            Route::post('/add-permission/{id}', [PermissionController::class, 'submitPermission'])->name('submit-permission');
        });
        //Create User Permission
        Route::group(['middleware' => 'CreateUser'], function () {
            Route::get('/create-user',  [UserController::class, 'create'])->name('create-user');
            Route::post('/create-user', [UserController::class, 'createPost'])->name('create-user-post');
        });
        //Update User Permission
        Route::group(['middleware' => 'UpdateUser'], function () {
            Route::get('/update-user/{id}',    [UserController::class, 'update'])->name('update-user');
            Route::post('/update-user/{id}',   [UserController::class, 'updatePost'])->name('update-user-post');
        });
        //Delete User Permission
        Route::group(['middleware' => 'DeleteUser'], function () {
            Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('delete-user');
        });
    });

    Route::group(['middleware' => 'isLogin'], function () {
        Route::get('/login',         [BackAuthController::class, 'login'])->name('login');
        Route::post('/login-submit', [BackAuthController::class, 'loginPost'])->name('login-submit');
    });

    Route::get('/logout', [BackAuthController::class, 'logOut'])->name('logout');
});
