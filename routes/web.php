<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;

//Front Routes
Route::get('/',        [HomeController::class, 'index'])->name('home');
Route::get('/about',   [HomeController::class, 'about'])->name('about');
Route::get('/projects',[HomeController::class, 'projects'])->name('projects');
Route::get('/blogs',   [HomeController::class, 'blogs'])->name('blogs');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

//Back Routes