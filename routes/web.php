<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\App\AboutController;
use App\Http\Controllers\App\ContactController;
use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\Auth\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Blog\ArticleController;
use App\Http\Controllers\Blog\AuthorProfileController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\CommentController;
use App\Http\Controllers\Blog\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::post('/', [HomeController::class, 'create']);
Route::get('/about', [AboutController::class, 'index'])
    ->name('about');
Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');
Route::get('/category/{category}', [CategoryController::class, 'index'])
    ->name('category');
Route::get('/author/{author}', [AuthorProfileController::class, 'index'])
    ->name('author.profile');
Route::get('/tag/{tag}', [TagController::class, 'index'])
    ->name('tag');
Route::get('/article/{article}', [ArticleController::class, 'index'])
    ->name('article');
Route::post('/article/{article}', [CommentController::class, 'create'])
    ->name('comment.create');
Route::put('/article/{comment}', [CommentController::class, 'update'])
    ->name('comment.update');
Route::delete('/article/{comment}', [CommentController::class, 'reply'])
    ->name('comment.reply');

Route::middleware('guest')->prefix('/admin')->group(function () {
});

Route::prefix('/admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminLoginController::class, 'index'])
            ->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'login']);
    });
    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
    });
});
