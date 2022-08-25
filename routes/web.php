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
Route::get('download-cv',[FrontHomeController::class, 'downloadCv'])->name('download-cv');
Route::post('/contact',  [FrontHomeController::class, 'contact'])->name('contact');
Route::match(['get', 'post'], '/register', [FrontAuthController::class, 'index'])->name('register');

//Back Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'notLogin'], function () {
        //Public routes for admins
        Route::get('/',           [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home',       [DashboardController::class, 'home'])->name('home');
        Route::get('/users',      [DashboardController::class, 'users'])->name('users');
        Route::get('/skills',     [DashboardController::class, 'skills'])->name('skills');
        Route::get('/about',      [DashboardController::class, 'about'])->name('about');
        Route::get('/experience', [DashboardController::class, 'experience'])->name('experience');
        Route::get('/portfolio',  [DashboardController::class, 'portfolio'])->name('portfolio');

        //Permission routes for SuperAdmin
        Route::group(['middleware' => 'isAdmin'], function () {
            Route::get('/permissions',          [DashboardController::class, 'permissions'])->name('permissions');
            Route::match(['get', 'post'], '/add-permission/{id}',[PermissionController::class, 'index'])->name('create-permission');
        });
        //View Message
        Route::group(['middleware' => 'ViewMessage'], function () {
            Route::get('/message',            [DashboardController::class, 'messages'])->name('message');
            Route::get('/checked-seen/{id}',  [MessageController::class, 'checkSeened'])->name('checked-seen');
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
            Route::match(['get', 'post'], '/create-user',[UserController::class, 'create'])->name('create-user');
        });
        //Update User Permission
        Route::group(['middleware' => 'UpdateUser'], function () {
            Route::match(['get', 'post'], '/update-user/{id}',[UserController::class, 'update'])->name('update-user');
        });
        //Delete User Permission
        Route::group(['middleware' => 'DeleteUser'], function () {
            Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('delete-user');
        });
        //Create Skill
        Route::group(['middleware' => 'CreateSkill'], function () {
            Route::match(['get', 'post'], '/create-skill',[SkillController::class, 'create'])->name('create-skill');
        });
        //Delete Skill
        Route::group(['middleware' => 'DeleteSkill'], function () {
            Route::get('delete-skill/{id}', [SkillController::class, 'delete'])->name('delete-skill');
        });
        //Create Experience & Education
        Route::group(['middleware' => 'CreateExperience'], function () {
            Route::match(['get', 'post'], '/create-experience',[ExperienceController::class, 'create'])->name('create-experience');
        });
        //Delete Experience & Education
        Route::group(['middleware' => 'DeleteExperience'], function () {
            Route::get('delete-experience/{id}', [ExperienceController::class, 'delete'])->name('delete-exp');
        });
        //Create Project
        Route::group(['middleware' => 'CreateProject'], function () {
            Route::match(['get', 'post'], '/create-project',[PortfolioController::class, 'create'])->name('create-project');
        });
        //Update Project
        Route::group(['middleware' => 'UpdateProject'], function () {
            Route::match(['get', 'post'], '/update-project/{id}',[PortfolioController::class, 'update'])->name('update-project');
        });
        //Delete Project
        Route::group(['middleware' => 'DeleteProject'], function () {
            Route::get('delete-project/{id}',  [PortfolioController::class, 'delete'])->name('delete-project');
        });
        //Delete Message
        Route::group(['middleware' => 'DeleteMessage'], function () {
            Route::get('/delete-message/{id}', [MessageController::class, 'deleteMessage'])->name('delete-message');
        });
    });

    Route::group(['middleware' => 'isLogin'], function () {
        Route::match(['get', 'post'], '/login',[BackAuthController::class, 'login'])->name('login');
    });

    Route::get('/logout', [BackAuthController::class, 'logOut'])->name('logout');
});
