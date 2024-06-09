<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rotte per IdeaController
Route::resource('ideas', IdeaController::class)->except(['index', 'create'])->middleware('auth');
Route::resource('ideas', IdeaController::class)->only(['show']);

// Rotte per CommentController
Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');

// Rotte per UserController
Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

// Rotte per AuthController
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authentication'])->name('login.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Rotta per TermsController
Route::get('/terms', [TermsController::class, 'index'])->name('terms.index');

Route::post('/user/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('user.follow');
Route::post('/user/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('user.unfollow');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
