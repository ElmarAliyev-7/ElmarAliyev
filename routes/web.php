<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\{
    HomeController as FrontHomeController,
    AuthController as FrontAuthController,
};
use App\Http\Controllers\Back\{
    AuthController as BackAuthController,
    HomeController as BackHomeController,
    DashboardController,
    PermissionController,
    UserController,
    SkillController,
    ExperienceController,
    PortfolioController,
    BlogController,
    MessageController,
};

//Front Routes
Route::get('/',            [FrontHomeController::class, 'index'])->name('home');
Route::get('/blogs',       [FrontHomeController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [FrontHomeController::class, 'blog'])->name('blog');
Route::get('/projects',    [FrontHomeController::class, 'projects'])->name('projects');
Route::get('/download-cv', [FrontHomeController::class, 'downloadCv'])->name('download-cv');
Route::post('/contact',    [FrontHomeController::class, 'contact'])->name('contact');

Route::group(['middleware' => 'isNotSiteLogin'], function(){
    Route::match(['get', 'post'], '/login',      [FrontAuthController::class, 'login'])->name('login');
    Route::match(['get', 'post'], '/register',   [FrontAuthController::class, 'index'])->name('register');
});

Route::group(['middleware' => 'isSiteLogin'], function () {
    Route::get('/profile',     [FrontAuthController::class, 'profile'])->name('profile');
    Route::get('/logout',      [FrontAuthController::class, 'logOut'])->name('logout');
    Route::put('/update-profile/{id}', [FrontAuthController::class, 'updateProfile'])->name('update-profile');
    Route::patch('/update-password/{id}', [FrontAuthController::class, 'updatePassword'])->name('update-password');
});

//Back Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::group(['middleware' => 'isLogin'], function () {
        //Public routes for admins
        Route::get('/',           [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/home',       [DashboardController::class, 'home'])->name('home');
        Route::get('/users',      [DashboardController::class, 'users'])->name('users');
        Route::get('/skills',     [DashboardController::class, 'skills'])->name('skills');
        Route::get('/about',      [DashboardController::class, 'about'])->name('about');
        Route::get('/experience', [DashboardController::class, 'experience'])->name('experience');
        Route::get('/portfolio',  [DashboardController::class, 'portfolio'])->name('portfolio');
        Route::get('/blogs',      [DashboardController::class, 'blog'])->name('blog');

        //Permission routes for SuperAdmin
        Route::group(['middleware' => 'isSuperAdmin'], function () {
            Route::get('/permissions',          [DashboardController::class, 'permissions'])->name('permissions');
            Route::match(['get', 'post'], '/add-permission/{id}',[PermissionController::class, 'index'])->name('create-permission');
        });

        //Update HomePage Permission
        Route::group(['middleware' => 'UpdateHomePage'], function () {
            Route::put('/home',  [BackHomeController::class, 'index'])->name('home-page');
        });

        //Update AboutPage Permission
        Route::group(['middleware' => 'UpdateAboutPage'], function () {
            Route::put('/about', [BackHomeController::class, 'about'])->name('about-post');
        });

        //Create User Permission
        Route::group(['middleware' => 'CreateUser'], function () {
            Route::match(['get', 'post'], '/create-user',[UserController::class, 'create'])->name('create-user');
        });
        //Update User Permission
        Route::group(['middleware' => 'UpdateUser'], function () {
            Route::match(['get', 'put'], '/update-user/{id}',[UserController::class, 'update'])->name('update-user');
        });
        //Delete User Permission
        Route::group(['middleware' => 'DeleteUser'], function () {
            Route::delete('/delete-user/{id}', [UserController::class, 'delete'])->name('delete-user');
        });

        //Create Skill
        Route::group(['middleware' => 'CreateSkill'], function () {
            Route::match(['get', 'post'], '/create-skill',[SkillController::class, 'create'])->name('create-skill');
        });
        //Delete Skill
        Route::group(['middleware' => 'DeleteSkill'], function () {
            Route::delete('delete-skill/{id}', [SkillController::class, 'delete'])->name('delete-skill');
        });

        //Create Experience & Education
        Route::group(['middleware' => 'CreateExperience'], function () {
            Route::match(['get', 'post'], '/create-experience',[ExperienceController::class, 'create'])->name('create-experience');
        });
        //Update Experience & Education
        Route::group(['middleware' => 'UpdateExperience'], function () {
            Route::match(['get', 'put'], '/update-experience/{id}',[ExperienceController::class, 'update'])->name('update-experience');
        });
        //Delete Experience & Education
        Route::group(['middleware' => 'DeleteExperience'], function () {
            Route::delete('delete-experience/{id}', [ExperienceController::class, 'delete'])->name('delete-exp');
        });

        //Create Project
        Route::group(['middleware' => 'CreateProject'], function () {
            Route::match(['get', 'post'], '/create-project',[PortfolioController::class, 'create'])->name('create-project');
        });
        //Update Project
        Route::group(['middleware' => 'UpdateProject'], function () {
            Route::match(['get', 'put'], '/update-project/{id}',[PortfolioController::class, 'update'])->name('update-project');
            Route::get('/sort-projects', [PortfolioController::class, 'sort'])->name('sort-projects');
        });
        //Delete Project
        Route::group(['middleware' => 'DeleteProject'], function () {
            Route::delete('delete-project/{id}',  [PortfolioController::class, 'delete'])->name('delete-project');
        });

        //Create Blog
        Route::group(['middleware' => 'CreateBlog'], function () {
            Route::match(['get', 'post'], '/create-blog',[BlogController::class, 'create'])->name('create-blog');
        });
        //Update Blog
        Route::group(['middleware' => 'UpdateBlog'], function () {
            Route::match(['get', 'put'], '/update-blog/{id}',[BlogController::class, 'update'])->name('update-blog');
        });
        //Delete Blog
        Route::group(['middleware' => 'DeleteBlog'], function () {
            Route::delete('delete-blog/{id}',  [BlogController::class, 'delete'])->name('delete-blog');
        });

        //View Message
        Route::group(['middleware' => 'ViewMessage'], function () {
            Route::get('/message',             [DashboardController::class, 'messages'])->name('message');
            Route::get('/show-message/{id}',   [MessageController::class,   'show'])->name('show-message');
        });
        //Delete Message
        Route::group(['middleware' => 'DeleteMessage'], function () {
            Route::delete('/delete-message/{id}', [MessageController::class, 'delete'])->name('delete-message');
            Route::delete('/delete-all-messages', [MessageController::class,  'bulkDelete'])->name('delete-all-messages');
        });

        //LogOut
        Route::get('/logout', [BackAuthController::class, 'logOut'])->name('logout');
    });

    Route::group(['middleware' => 'notLogin'], function () {
        Route::match(['get', 'post'], '/login',[BackAuthController::class, 'login'])->name('login');
    });
});
