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
use App\Http\Controllers\Back\MessageController;

//Front Routes
Route::get('/',          [FrontHomeController::class, 'index'])->name('home');
Route::get('/register',  [FrontAuthController::class, 'register'])->name('register');
Route::post('/register', [FrontAuthController::class, 'registerPost'])->name('register-post');
Route::post('/contact',  [FrontHomeController::class, 'contact'])->name('contact');
Route::get('download-cv', [FrontHomeController::class, 'downloadCv'])->name('download-cv');

//Back Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'notLogin'], function () {
        //Public routes for admins
        Route::get('/',           [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/users',      [DashboardController::class, 'users'])->name('users');
        Route::get('/skills',     [DashboardController::class, 'skills'])->name('skills');
        Route::get('/experience', [DashboardController::class, 'experience'])->name('experience');
        Route::get('/portfolio',  [DashboardController::class, 'portfolio'])->name('portfolio');
        Route::get('/home',       [DashboardController::class, 'home'])->name('home');
        Route::get('/about',      [DashboardController::class, 'about'])->name('about');
        Route::get('/profile',    [DashboardController::class, 'profile'])->name('profile');

        //Permission routes for SuperAdmin
        Route::group(['middleware' => 'isAdmin'], function () {
            Route::get('/permissions',          [DashboardController::class, 'permissions'])->name('permissions');
            Route::get('/add-permission/{id}',  [PermissionController::class, 'addPermission'])->name('add-permission');
            Route::post('/add-permission/{id}', [PermissionController::class, 'submitPermission'])->name('submit-permission');
        });
        //View Message
        Route::group(['middleware' => 'ViewMessage'], function () {
            Route::get('/message',           [DashboardController::class, 'messages'])->name('message');
            Route::get('/checked-seen/{id}', [MessageController::class, 'checkSeened'])->name('checked-seen');
        });
        //Update HomePage Permission
        Route::group(['middleware' => 'UpdateHomePage'], function () {
            Route::post('/home',  [BackHomeController::class, 'index'])->name('home-page');
        });
        //Update AboutPage Permission
        Route::group(['middleware' => 'UpdateAboutPage'], function () {
            Route::post('/about', [BackHomeController::class, 'about'])->name('about-post');
        });
        //Create User Permission
        Route::group(['middleware' => 'CreateUser'], function () {
            Route::get('/create-user',  [UserController::class, 'create'])->name('create-user');
            Route::post('/create-user', [UserController::class, 'createPost'])->name('create-user-post');
        });
        //Update User Permission
        Route::group(['middleware' => 'UpdateUser'], function () {
            Route::get('/update-user/{id}',  [UserController::class, 'update'])->name('update-user');
            Route::post('/update-user/{id}', [UserController::class, 'updatePost'])->name('update-user-post');
        });
        //Delete User Permission
        Route::group(['middleware' => 'DeleteUser'], function () {
            Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('delete-user');
        });
        //Create Skill
        Route::group(['middleware' => 'CreateSkill'], function () {
            Route::get('/my-skills', [SkillController::class, 'create'])->name('my-skills');
            Route::post('my-skills', [SkillController::class, 'createPost'])->name('skill-post');
        });
        //Delete Skill
        Route::group(['middleware' => 'DeleteSkill'], function () {
            Route::get('delete-skill/{id}', [SkillController::class, 'delete'])->name('delete-skill');
        });
        //Create Experience & Education
        Route::group(['middleware' => 'CreateExperience'], function () {
            Route::get('/add-experience',  [ExperienceController::class, 'create'])->name('add-experience');
            Route::post('/add-experience', [ExperienceController::class, 'createPost'])->name('experience-post');
        });
        //Delete Experience & Education
        Route::group(['middleware' => 'DeleteExperience'], function () {
            Route::get('delete-experience/{id}', [ExperienceController::class, 'delete'])->name('delete-exp');
        });
        //Create Project
        Route::group(['middleware' => 'CreateProject'], function () {
            Route::get('/add-project', [PortfolioController::class, 'create'])->name('add-project');
            Route::post('/add-project',[PortfolioController::class, 'createPost'])->name('project-post');
        });
        //Update Project
        Route::group(['middleware' => 'UpdateProject'], function () {
            Route::get('update-project/{id}',  [PortfolioController::class, 'update'])->name('update-project');
            Route::post('update-project/{id}', [PortfolioController::class, 'updatePost'])->name('update-project-post');
        });
        //Delete Project
        Route::group(['middleware' => 'DeleteProject'], function () {
            Route::get('delete-project/{id}', [PortfolioController::class, 'delete'])->name('delete-project');
        });
        //Delete Message
        Route::group(['middleware' => 'DeleteMessage'], function () {
            Route::get('/delete-message/{id}', [MessageController::class, 'deleteMessage'])->name('delete-message');
        });
    });

    Route::group(['middleware' => 'isLogin'], function () {
        Route::get('/login',         [BackAuthController::class, 'login'])->name('login');
        Route::post('/login-submit', [BackAuthController::class, 'loginPost'])->name('login-submit');
    });

    Route::get('/logout', [BackAuthController::class, 'logOut'])->name('logout');
});
