<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;

Route::get('/',        [HomeController::class, 'index'])->name('home');
Route::get('/blogs',   [HomeController::class, 'blogs'])->name('blogs');
Route::get('/projects',[HomeController::class, 'projects'])->name('projects');